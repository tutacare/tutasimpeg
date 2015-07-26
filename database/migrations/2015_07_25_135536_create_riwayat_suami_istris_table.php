<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRiwayatSuamiIstrisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('riwayat_suami_istris', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('kartu_induk_pegawai_id')->unsigned();
      			$table->foreign('kartu_induk_pegawai_id')->references('id')->on('kartu_induk_pegawais')->onDelete('cascade');
            $table->string('nama', 100);
            $table->date('tgl_lahir');
            $table->date('tgl_nikah');
            $table->date('tgl_pisah')->nullable()->default(NULL);
            $table->string('pekerjaan', 100)->nullable();
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
        Schema::drop('riwayat_suami_istris');
    }
}
