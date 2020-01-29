<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnggotaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('anggota', function (Blueprint $table) {
            $table->bigIncrements('anggota_id');
            $table->string('anggota_nama', 100)->nullable();
            $table->string('jenis_kelamin', 1)->nullable();
            $table->date('tanggal_lahir')->nullable();
            $table->string('alamat', 100)->nullable();
            $table->string('kode_pos', 100)->nullable();
            $table->string('telepon', 100)->nullable();
            $table->string('whatsapp', 100)->nullable();
            $table->string('facebook', 100)->nullable();
            $table->string('instagram', 100)->nullable();
            $table->string('posel', 100)->nullable();
            $table->string('katasandi', 100)->nullable();
            $table->string('foto')->default('default.jpg');
            $table->string('kode_konfirmasi', 100)->nullable();
            $table->string('status_anggota', 1)->nullable();
            $table->unsignedBigInteger('anggota_tipe_id')->nullable();
            $table->unsignedBigInteger('provinsi_id')->nullable();
            $table->unsignedBigInteger('kabupaten_id')->nullable();
            $table->unsignedBigInteger('kecamatan_id')->nullable();
            $table->unsignedBigInteger('desa_id')->nullable();
            $table->unsignedBigInteger('jurusan_id')->nullable();
            $table->unsignedBigInteger('kelas_id')->nullable();

            $table->foreign('anggota_tipe_id')->references('anggota_tipe_id')->on('anggota_tipe')->onDelete('cascade');
            $table->foreign('provinsi_id')->references('provinsi_id')->on('provinsi')->onDelete('cascade');
            $table->foreign('kabupaten_id')->references('kabupaten_id')->on('kabupaten')->onDelete('cascade');
            $table->foreign('kecamatan_id')->references('kecamatan_id')->on('kecamatan')->onDelete('cascade');
            $table->foreign('desa_id')->references('desa_id')->on('desa')->onDelete('cascade');
            $table->foreign('jurusan_id')->references('jurusan_id')->on('jurusan')->onDelete('cascade');
            $table->foreign('kelas_id')->references('kelas_id')->on('kelas')->onDelete('cascade');
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
        Schema::dropIfExists('anggota');
    }
}
