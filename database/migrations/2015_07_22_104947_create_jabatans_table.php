<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJabatansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jabatans', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('kartu_induk_pegawai_id')->unsigned();
      			$table->foreign('kartu_induk_pegawai_id')->references('id')->on('kartu_induk_pegawais')->onDelete('cascade');
            $table->string('jabatan', 255)->nullable();
            $table->string('unit_kerja', 100)->nullable();
            $table->string('keterangan_unit_kerja', 100)->nullable();
            $table->string('pangkat_golongan_ruang', 100)->nullable();
            $table->date('tmt_pangkat')->nullable()->default(NULL);
            $table->string('masakerja_tahun', 10)->nullable();
            $table->string('masakerja_bulan', 10)->nullable();
            $table->string('pendidikan_terakhir', 100)->nullable();
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
        Schema::drop('jabatans');
    }
}
