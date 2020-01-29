<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnggotaTipeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('anggota_tipe', function (Blueprint $table) {
            $table->bigIncrements('anggota_tipe_id');
            $table->string('anggota_tipe_nama', 100)->nullable();
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
        Schema::dropIfExists('anggota_tipe');
    }
}
