<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePuisiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('puisi', function (Blueprint $table) {
            $table->bigIncrements('puisi_id');
            $table->string('puisi_judul', 100)->nullable();
            $table->string('puisi_karya', 100)->nullable();
            $table->string('puisi_gambar', 100)->default('default.jpg');
            $table->text('bait1', 10000)->nullable();
            $table->text('bait2', 10000)->nullable();
            $table->text('bait3', 10000)->nullable();
            $table->text('bait4', 10000)->nullable();
            $table->string('konfirmasi', 1)->nullable();
            $table->unsignedBigInteger('anggota_id')->nullable();

            $table->foreign('anggota_id')->references('anggota_id')->on('users')->onDelete('cascade');
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
        Schema::dropIfExists('puisi');
    }
}
