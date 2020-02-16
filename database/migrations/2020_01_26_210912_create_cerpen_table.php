<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCerpenTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cerpen', function (Blueprint $table) {
            $table->bigIncrements('cerpen_id');
            $table->string('cerpen_judul', 100)->nullable();
            $table->string('cerpen_karya', 100)->nullable();
            $table->string('cerpen_gambar', 100)->default('default.jpg');
            $table->text('cerpen_isi', 10000)->nullable();
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
        Schema::dropIfExists('cerpen');
    }
}
