<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKlasifikasiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('klasifikasi', function (Blueprint $table) {
            $table->bigIncrements('klasifikasi_id');
            $table->string('klasifikasi_nama', 100)->nullable();
            $table->string('terhapus', 1)->nullable();
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
        Schema::dropIfExists('klasifikasi');
    }
}
