<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNovelTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('novel', function (Blueprint $table) {
            $table->bigIncrements('novel_id');
            $table->string('novel_judul', 100)->nullable();
            $table->string('novel_karya', 100)->nullable();
            $table->string('novel_gambar', 100)->default('default.jpg');
            $table->text('novel_isi', 10000)->nullable();
            $table->string('konfirmasi', 1)->nullable();
            $table->unsignedBigInteger('anggota_id')->nullable();

            $table->foreign('anggota_id')->references('anggota_id')->on('users')->onDelete('cascade');
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
        Schema::dropIfExists('novel');
    }
}
