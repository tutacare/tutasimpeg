<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRiwayatPendidikansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('riwayat_pendidikans', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('kartu_induk_pegawai_id')->unsigned();
      			$table->foreign('kartu_induk_pegawai_id')->references('id')->on('kartu_induk_pegawais')->onDelete('cascade');
            $table->string('nama_sekolah', 200);
            $table->string('tingkat', 20);
            $table->string('fakultas', 100)->nullable();
            $table->enum('akta', ['Y', 'N']);
            $table->string('jurusan', 100)->nullable();
            $table->string('tahun_lulus', 4);
            $table->string('lokasi_sekolah', 255)->nullable();
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
        Schema::drop('riwayat_pendidikans');
    }
}
