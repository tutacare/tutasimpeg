<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRiwayatDiklatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('riwayat_diklats', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('kartu_induk_pegawai_id')->unsigned();
      			$table->foreign('kartu_induk_pegawai_id')->references('id')->on('kartu_induk_pegawais')->onDelete('cascade');
            $table->string('nama_diklat', 100);
            $table->string('diklat_lain', 100)->nullable();
            $table->string('penyelenggara_diklat', 100);
            $table->string('tahun_penyelenggaraan', 4);
            $table->string('lama_diklat_bulan', 10)->nullable();
            $table->string('lama_diklat_hari', 10)->nullable();
            $table->string('lama_diklat_jam', 100)->nullable();
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
        Schema::drop('riwayat_diklats');
    }
}
