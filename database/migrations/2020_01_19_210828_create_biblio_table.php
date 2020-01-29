<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBiblioTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('biblio', function (Blueprint $table) {
            $table->bigIncrements('biblio_id');
            $table->string('judul', 100)->nullable();
            $table->string('edisi', 100)->nullable();
            $table->string('isbn', 100)->nullable();
            $table->string('harga_buku', 100)->nullable();
            $table->string('penerbit_tahun', 100)->nullable();
            $table->string('penerbit_tempat', 100)->nullable();
            $table->string('deskripsi', 100)->nullable();
            $table->string('gambar', 100)->default('default.jpg');
            $table->string('lampiran', 100)->nullable();
            $table->string('promosi', 1)->nullable();
            $table->string('publik', 1)->nullable();
            $table->string('panggil', 100)->nullable();
            $table->string('eksemplar', 100)->nullable();
            $table->string('terhapus', 1)->nullable();
            $table->unsignedBigInteger('penulis_id')->nullable();
            $table->unsignedBigInteger('penerbit_id')->nullable();
            $table->unsignedBigInteger('tipekoleksi_id')->nullable();
            $table->unsignedBigInteger('klasifikasi_id')->nullable();
            $table->unsignedBigInteger('status_item_id')->nullable();
            $table->unsignedBigInteger('sumber_item_id')->nullable();

            $table->foreign('penulis_id')->references('penulis_id')->on('penulis')->onDelete('cascade');
            $table->foreign('penerbit_id')->references('penerbit_id')->on('penerbit')->onDelete('cascade');
            $table->foreign('tipekoleksi_id')->references('tipekoleksi_id')->on('tipekoleksi')->onDelete('cascade');
            $table->foreign('klasifikasi_id')->references('klasifikasi_id')->on('klasifikasi')->onDelete('cascade');
            $table->foreign('status_item_id')->references('status_item_id')->on('status_item')->onDelete('cascade');
            $table->foreign('sumber_item_id')->references('sumber_item_id')->on('sumber_item')->onDelete('cascade');
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
        Schema::dropIfExists('biblio');
    }
}
