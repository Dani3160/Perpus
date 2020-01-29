<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDesaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('desa', function (Blueprint $table) {
            $table->bigIncrements('desa_id');
            $table->string('desa_nama', 100)->nullable();
            $table->unsignedBigInteger('kecamatan_id')->nullable();
            $table->unsignedBigInteger('kabupaten_id')->nullable();
            $table->unsignedBigInteger('provinsi_id')->nullable();
            $table->foreign('kecamatan_id')->references('kecamatan_id')->on('kecamatan')->onDelete('cascade');
            $table->foreign('kabupaten_id')->references('kabupaten_id')->on('kabupaten')->onDelete('cascade');
            $table->foreign('provinsi_id')->references('provinsi_id')->on('provinsi')->onDelete('cascade');
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
        Schema::dropIfExists('desa');
    }
}
