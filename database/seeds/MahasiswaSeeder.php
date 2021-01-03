<?php

use Illuminate\Database\Seeder;
use App\Mahasiswa;

class MahasiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Mahasiswa::create([
            'id_prodi' => 7,
            'nim' => '16090122',
            'nama' => 'Fani Nadhiya Putra',
            'jenis_kelamin' => 'laki-laki',
            'agama' => 'islam',
            'jalur' => 'a',
            'nama_ortu' => 'b',
            'tempat_lahir' => 'Tegal',
            'tanggal_lahir' => '1998-01-24',
            'alamat' => 'Tegal',
            'angkatan' => '2016',
            //'semester' => '8',
            'no_hp' => '085866565620',
            'email' => 'fanninadhiya@gmail.com',
            'password' => bcrypt(16090122)
        ]);
    }
}
