<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKartuIndukPegawaisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kartu_induk_pegawais', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nip', 20)->unique();
            $table->string('karpeg', 30);
            $table->string('karis_karsu', 30);
            $table->string('nama_lengkap', 100);
            $table->string('tempat_lahir', 30);
            $table->date('tgl_lahir');
            $table->string('jenis_kelamin', 30);
            $table->string('status_perkawinan', 30);
            $table->date('tgl_masuk_pegawai');
            $table->string('status_kepegawaian', 30);
            $table->string('agama', 30);
            $table->string('jenis_kepegawaian', 30);
            $table->date('tgl_pensiun');
            $table->string('foto', 255)->default('no-foto.png');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('kartu_induk_pegawais');
    }
}
