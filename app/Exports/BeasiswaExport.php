<?php

namespace App\Exports;


use App\Beasiswa;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromQuery;

class BeasiswaExport implements FromQuery
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
}
