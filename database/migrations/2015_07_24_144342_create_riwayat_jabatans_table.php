<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRiwayatJabatansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('riwayat_jabatans', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('kartu_induk_pegawai_id')->unsigned();
      			$table->foreign('kartu_induk_pegawai_id')->references('id')->on('kartu_induk_pegawais')->onDelete('cascade');
            $table->string('jabatan_utama', 100);
            $table->string('bidang_studi_mata_kuliah', 100)->nullable();
            $table->string('unit_kerja', 100);
            $table->string('no_sk', 20);
            $table->date('tgl_sk');
            $table->date('tmt_sk');
            $table->string('keterangan_jabatan', 255);
            $table->string('golongan_pangkat', 10);
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
        Schema::drop('riwayat_jabatans');
    }
}
