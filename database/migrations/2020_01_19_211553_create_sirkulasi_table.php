<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSirkulasiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sirkulasi', function (Blueprint $table) {
            $table->bigIncrements('sirkulasi_id');
            $table->date('mulai_pinjam')->nullable();
            $table->date('kembali_pinjam')->nullable();
            $table->date('perpanjangan')->nullable();

            $table->unsignedBigInteger('anggota_id')->nullable();
            $table->unsignedBigInteger('biblio_id')->nullable();
            $table->unsignedBigInteger('aturan_id')->nullable();
            $table->unsignedBigInteger('status_sirkulasi_id')->nullable();

            $table->foreign('anggota_id')->references('anggota_id')->on('users')->onDelete('cascade');
            $table->foreign('biblio_id')->references('biblio_id')->on('biblio')->onDelete('cascade');
            $table->foreign('aturan_id')->references('aturan_id')->on('aturan')->onDelete('cascade');
            $table->foreign('status_sirkulasi_id')->references('status_sirkulasi_id')->on('status_sirkulasi')->onDelete('cascade');
            $table->timestamp('pembuatan')->nullable();
            $table->timestamp('perubahan')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sirkulasi');
    }
}
