<?php

use Illuminate\Database\Seeder;
use App\Prodi;


class ProdiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        Prodi::create([
            'nama' => 'user1',
            'email' => 'informatika@gmail.com',
            'no_hp' => '085385723130',
            'program_study' => 'D4 Teknik Informatika',
            'logo' => '1593848880.png',
            'password' => bcrypt(1234567890)
        ]);
        Prodi::create([
            'nama' => 'user2',
            'email' => 'asp@gmail.com',
            'no_hp' => '085385723131',
            'program_study' => 'D4 Akuntansi Sektor Publik',
            'logo' => '1593848880.png',
            'password' => bcrypt(1234567890)
        ]);
        Prodi::create([
            'nama' => 'user3',
            'email' => 'komputer@gmail.com',
            'no_hp' => '085385723132',
            'program_study' => 'D3 Teknik Komputer',
            'logo' => '1593848880.png',
            'password' => bcrypt(1234567890)
        ]);
        Prodi::create([
            'nama' => 'user4',
            'email' => 'farmasi@gmail.com',
            'no_hp' => '085385723133',
            'program_study' => 'D3 Farmasi',
            'logo' => '1593848880.png',
            'password' => bcrypt(1234567890)
        ]);
        Prodi::create([
            'nama' => 'user5',
            'email' => 'Kebidanan@gmail.com',
            'no_hp' => '085385723134',
            'program_study' => 'D3 Kebidanan',
            'logo' => '1593850425.png',
            'password' => bcrypt(1234567890)
        ]);
        Prodi::create([
            'nama' => 'user5',
            'email' => 'akuntansi@gmail.com',
            'no_hp' => '085385723135',
            'program_study' => 'D3 Akuntansi',
            'logo' => '1593848880.png',
            'password' => bcrypt(1234567890)
        ]);
        Prodi::create([
            'nama' => 'user6',
            'email' => 'perhotelan@gmail.com',
            'no_hp' => '085385723136',
            'program_study' => 'D3 Perhotelan',
            'logo' => '1593850345.png',
            'password' => bcrypt(1234567890)
        ]);

    }
}
