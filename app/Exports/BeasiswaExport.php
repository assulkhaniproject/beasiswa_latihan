<?php

namespace App\Exports;


use App\Beasiswa;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithStrictNullComparison;

class BeasiswaExport implements FromQuery, WithStrictNullComparison, WithHeadings, WithMapping, ShouldAutoSize
{
    use Exportable;

    public function __construct($kategori, $prodi, $status)
    {
        $this->kategori = $kategori;
        $this->prodi = $prodi;
        $this->status = $status;
    }

    public function query()
    {
        $prodi = $this->prodi;
        $status = $this->status;
        return Beasiswa::query()->whereHas('mahasiswa', function ($query) use ($prodi) {
            $prodi != null ? $query->where('id_prodi', $prodi) : null;
        })->where('kategori', $this->kategori->kategori)
            ->where('tahun_akademik', $this->kategori->tahun_akademik)
            ->where(function ($query) use ($status) {
                $status != 'all' ? $query->where('status', $status) : null;
            });
    }


    /**
     * @param mixed $row
     *
     * @return array
     */
    public function map($row): array
    {
        if ($row->status === 1) {
            $status = "Diterima";
        } elseif($row->status === 0) {
            $status = "Ditolak";
        } else {
            $status = "Menunggu";
        }

        $fields = [
//            $row->id,
            $status,
            $row->kategori,
            $row->tahun_akademik,
            $row->mahasiswa->nama,
            $row->jenis_kelamin,
            $row->ipk,
            $row->semester,
            $row->email,
            $row->no_hp,
            $row->agama,
            $row->alamat,
            $row->kode_pos,
            $row->nama_ortu,
            $row->alamat_ortu,
            $row->pekerjaan_ortu,
            $row->no_hp_ortu,
            $row->penghasilan_ortu,
            $row->tanggungan_ortu,
            $row->nama_bank,
            $row->cabang_bank,
            $row->no_rek,
            $row->nama_rek,

        ];
        return $fields;
    }


    /**
     * @return array
     */
    public function headings(): array
    {
        return [
//            '#',
            'Status',
            'Beasiswa',
            'Tahun Akademik',
            'Nama Mahasiswa',
            'Jenis Kelamin',
            'IPK',
            'Semester',
            'Email',
            'No Hp',
            'Agama',
            'Alamat',
            'Kode Pos',
            'Nama Orang Tua',
            'Alamat Orang Tua',
            'Pekerjaan Orang Tua',
            'No Hp Orang Tua',
            'Penghasilan Orang Tua',
            'Tanggungan Orang Tua',
            'Nama Bank',
            'Cabang Bank',
            'Nomer Rekening',
            'Pemilik Rekening',
        ];
    }
}
