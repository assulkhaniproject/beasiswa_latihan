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
            'nim' => '16090014',
            'nama' => 'Abu Muslih Assulkhani',
            'tempat_lahir' => 'Tegal',
            'tanggal_lahir' => '1997-05-08',
            'alamat' => 'Tegal',
            'angkatan' => '2016',
            'semester' => '8',
            'no_hp' => '085866565620',
            'email' => 'assulkhaniproject@gmail.com',
            'password' => bcrypt(16090014)
        ]);
    }
}
