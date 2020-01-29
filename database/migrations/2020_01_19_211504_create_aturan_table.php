<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAturanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('aturan', function (Blueprint $table) {
            $table->bigIncrements('aturan_id');
            $table->string('jumlah', 100)->nullable();
            $table->string('periode', 100)->nullable();
            $table->string('kali_pinjam', 100)->nullable();
            $table->string('denda', 100)->nullable();
            $table->string('toleransi', 100)->nullable();
            $table->unsignedBigInteger('anggota_tipe_id')->nullable();
            $table->foreign('anggota_tipe_id')->references('anggota_tipe_id')->on('anggota_tipe')->onDelete('cascade');
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
        Schema::dropIfExists('aturan');
    }
}
