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
            $table->integer('id_mahasiswa')->unsigned();
            $table->string('khs', 30);
            $table->string('krs', 30);
            $table->string('foto');
            $table->string('pekerjaan_ortu',50);
            $table->integer('penghasilan_ortu');
            $table->string('no_hp', 13);
            $table->string('nama_bank',20);
            $table->string('cabang_bank', 20);
            $table->string('no_rek', 50);
            $table->string('nama_pemegang_rekening', 50);
            $table->boolean('status')->default(false);
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
