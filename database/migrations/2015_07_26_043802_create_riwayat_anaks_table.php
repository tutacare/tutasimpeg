<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRiwayatAnaksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('riwayat_anaks', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('kartu_induk_pegawai_id')->unsigned();
      			$table->foreign('kartu_induk_pegawai_id')->references('id')->on('kartu_induk_pegawais')->onDelete('cascade');
            $table->string('nama', 100);
            $table->string('jenis_kelamin', 30);
            $table->date('tgl_lahir');
            $table->string('status_anak', 100);
            $table->string('keterangan', 255);
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
        Schema::drop('riwayat_anaks');
    }
}
