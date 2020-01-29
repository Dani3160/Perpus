<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePengaturanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pengaturan', function (Blueprint $table) {
            $table->bigIncrements('pengaturan_id');
            $table->string('tentang_kami', 100)->nullable();
            $table->string('tempat', 100)->nullable();
            $table->unsignedBigInteger('anggota_id')->nullable();

            $table->foreign('anggota_id')->references('anggota_id')->on('anggota')->onDelete('cascade');
            $table->date('operasional_awal')->nullable();
            $table->date('operasional_akhir')->nullable();
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
        Schema::dropIfExists('pengaturan');
    }
}
