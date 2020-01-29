<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTipeKoleksiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tipekoleksi', function (Blueprint $table) {
            $table->bigIncrements('tipekoleksi_id');
            $table->string('tipekoleksi_nama', 100)->nullable();
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
        Schema::dropIfExists('tipekoleksi');
    }
}
