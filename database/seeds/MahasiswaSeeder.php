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
            'id_prodi' => 1,
            'nim' => '17090076',
            'nama' => 'Anisa Pandu Sabillah',
            'tempat_lahir' => 'Tegal',
            'tanggal_lahir' => '1999-08-23',
            'alamat' => 'Cilacap',
            'angkatan' => '2017',
            'semester' => '6',
            'no_hp' => '085866565620',
            'email' => 'anisapandundis1@gmail.com',
            'password' => bcrypt(17090076)
        ]);
    }
}
