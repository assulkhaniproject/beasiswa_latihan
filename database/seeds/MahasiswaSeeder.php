<?php

use Illuminate\Database\Seeder;

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
           'id_prodi' => '09',
           'nim' => '16090014',
           'nama' => 'Abu Muslih Assulkhani',
           'tempat_lahir' => 'Tegal',
           'tanggal_lahir' => '08-05-1997',
            'alamat' => 'Tegal',
            'angkatan' => '2016',
            'semester' => '8',
            'no_hp' => '085385723130',
            'email' => 'assulkhani08@gmail.com',
            'password' => bcrypt('qwerty')
        ]);
    }
}
