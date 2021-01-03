<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBeasiswaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('beasiswa', function (Blueprint $table) {
            $table->increments('id');
            $table->string('kategori', 100);
            $table->string('tahun_akademik', 50);
            $table->integer('id_mahasiswa')->unsigned();
            $table->char('jenis_kelamin',9);
            $table->string('agama',10);
            $table->string('alamat', 100);
            $table->char('ipk', 4);
            $table->char('kode_pos',5);
            $table->char('semester',1);
            $table->string('email',50);
            $table->string('no_hp', 13);
            $table->string('scan_khs', 30);
            $table->string('scan_krs', 30);
            $table->string('scan_ktp', 30);
            $table->string('scan_ktm', 30);
            $table->string('foto',30);

            $table->string('nama_ortu', 50);
            $table->string('alamat_ortu',100);
            $table->string('pekerjaan_ortu',50);
            $table->string('no_hp_ortu',13);
            $table->string('penghasilan_ortu',50);
            $table->string('tanggungan_ortu',10);
            $table->string('scan_kk',30);
            $table->string('scan_penghasilan',30);

            $table->string('nama_bank',50);
            $table->string('cabang_bank', 20);
            $table->string('no_rek', 50);
            $table->string('nama_rek', 50);
            $table->string('scan_bt', 30);

            $table->boolean('status')->default(null);
            $table->timestamps();

            $table->foreign('id_mahasiswa')->references('id')->on('mahasiswa')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('beasiswa');
    }
}
