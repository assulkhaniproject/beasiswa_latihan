<?php

namespace App\Imports;

use App\Mahasiswa;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class MahasiswaImport implements ToModel, WithHeadingRow
{
    public function __construct($id_prodi)
    {
        $this->id_prodi = $id_prodi;
    }

    /**
     * @param array $row
     *
     * @return Model|Model[]|null
     */
    public function model(array $row)
    {
        return new Mahasiswa([
           'id_prodi' => $this->id_prodi,
           'nim' => $row['nim'],
           'nama' => $row['nama'],
           'tempat_lahir' => $row['tempat_lahir'],
           'tanggal_lahir' => $row['tanggal_lahir'],
           'alamat' => $row['alamat'],
           'angkatan' => $row['angkatan'],
           'semester' => $row['semester'],
           'no_hp' => $row['no_hp'],
           'email' => $row['email'],
           'password' => Hash::make($row['nim']),
        ]);
    }

    public function headingRow(): int
    {
        return 2;
    }
}
