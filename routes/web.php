<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::prefix('operator')->group(function(){
    // Dasboard
    Route::get('/dashboard', 'Operator\OperatorController@index')->name('operator.dashboard');

    // Operator-Biblio
    Route::prefix('biblio')->group(function(){
        // Tampil Biblio
        Route::get('/', 'Operator\DataMaster\BiblioController@daftarbiblio')->name('operator.biblio');
        Route::get('/datatable', 'Operator\DataMaster\BiblioController@bibliodatatable')->name('operator.biblio.datatable');

        // Tambah Biblio
        Route::post('/simpanbiblio', 'Operator\DataMaster\BiblioController@store')->name('operator.biblio.kirim');
        //cari penerbit dan penulis
		Route::get('/penulis/cari', 'Operator\DataMaster\BiblioController@caripenulis');
		Route::get('/penerbit/cari', 'Operator\DataMaster\BiblioController@caripenerbit');
		Route::get('/sumberitem/cari', 'Operator\DataMaster\BiblioController@carisumberitem');
		//ubah biblio
		Route::get('/ubah/biblio/{biblio_id}', 'Operator\DataMaster\BiblioController@edit')->name('operator.biblio.edit');
		Route::post('/{id}', 'Operator\DataMaster\BiblioController@update')->name('operator.biblio.ubah');
		//detail biblio
		Route::get('/detail/biblio/{id}', 'Operator\DataMaster\BiblioController@show')->name('operator.biblio.detail');
		//Export
		Route::get('/export/excel', 'Operator\DataMaster\BiblioController@export')->name('operator.biblio.export');
		//Import
		Route::get('/upload/excel', 'Operator\DataMaster\BiblioController@uploadexcel')->name('operator.biblio.upload.excel');
		Route::post('/import/excel', 'Operator\DataMaster\BiblioController@import')->name('operator.biblio.import.excel');
		//delete 
		Route::post('/hapus/{id}', 'Operator\DataMaster\BiblioController@delete')->name('operator.biblio.hapus');
		//riwayat biblio
		Route::get('/riwayat', 'Operator\DataMaster\BiblioController@indexRiwayat')->name('operator.biblio.riwayat');
		//datatable riwayat biblio
		Route::get('/riwayat/datatable', 'Operator\DataMaster\BiblioController@riwayatdatatable')->name('operator.biblio.riwayat.datatable');
    });
});
