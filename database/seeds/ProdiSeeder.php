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
            'email' => 'elektro@gmail.com',
            'no_hp' => '085385723130',
            'program_study' => 'DIII Elektro',
            'logo' => '1592834882.png',
            'kuota_beasiswa' => '5',
            'password' => bcrypt(1234567890)
        ]);
        Prodi::create([
            'nama' => 'user2',
            'email' => 'mesin@gmail.com',
            'no_hp' => '085385723131',
            'program_study' => 'DIII Teknik Mesin',
            'logo' => '1592851976.png',
            'kuota_beasiswa' => '5',
            'password' => bcrypt(1234567890)
        ]);
        Prodi::create([
            'nama' => 'user3',
            'email' => 'akuntansi@gmail.com',
            'no_hp' => '085385723132',
            'program_study' => 'DIII Akuntansi',
            'logo' => '1592852481.png',
            'kuota_beasiswa' => '5',
            'password' => bcrypt(1234567890)
        ]);
        Prodi::create([
            'nama' => 'user4',
            'email' => 'komputer@gmail.com',
            'no_hp' => '085385723133',
            'program_study' => 'DIII Teknik Komputer',
            'logo' => '1593848880.png',
            'kuota_beasiswa' => '5',
            'password' => bcrypt(1234567890)
        ]);
        Prodi::create([
            'nama' => 'user5',
            'email' => 'kebidanan@gmail.com',
            'no_hp' => '085385723134',
            'program_study' => 'DIII Kebidanan',
            'logo' => '1592834882.png',
            'kuota_beasiswa' => '5',
            'password' => bcrypt(1234567890)
        ]);
        Prodi::create([
            'nama' => 'user6',
            'email' => 'farmasi@gmail.com',
            'no_hp' => '085385723135',
            'program_study' => 'DIII Farmasi',
            'logo' => '1592852481.png',
            'kuota_beasiswa' => '5',
            'password' => bcrypt(1234567890)
        ]);
        Prodi::create([
            'nama' => 'user7',
            'email' => 'informatika@gmail.com',
            'no_hp' => '085385723136',
            'program_study' => 'DIII Teknik Informatika',
            'logo' => '1592852481.png',
            'kuota_beasiswa' => '5',
            'password' => bcrypt(1234567890)
        ]);
        Prodi::create([
            'nama' => 'user8',
            'email' => 'perhotelan@gmail.com',
            'no_hp' => '085385723137',
            'program_study' => 'DIII Perhotelan',
            'logo' => '1592852481.png',
            'kuota_beasiswa' => '5',
            'password' => bcrypt(1234567890)
        ]);
        Prodi::create([
            'nama' => 'user9',
            'email' => 'akuntansiSP',
            'no_hp' => '085385723138',
            'program_study' => 'DIV Akuntansi Sektor Publik',
            'logo' => '1592852481.png',
            'kuota_beasiswa' => '5',
            'password' => bcrypt(1234567890)
        ]);
        Prodi::create([
            'nama' => 'user10',
            'email' => 'desainKV@gmail.com',
            'no_hp' => '085385723139',
            'program_study' => 'DIII Desain Komunikasi Visual',
            'logo' => '1592852481.png',
            'kuota_beasiswa' => '5',
            'password' => bcrypt(1234567890)
        ]);

    }
}
