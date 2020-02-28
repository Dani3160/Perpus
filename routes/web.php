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

Auth::routes();

Route::get('/', function(){
	return view('landing');
});


//Auth
Route::get('/Masuk', 'Auth\LoginController@ShowMasukForm')->name('Masuk');
Route::get('/Daftar', 'Auth\RegisterController@ShowDaftarForm')->name('Daftar');
Route::post('/Daftar-Akun', 'Auth\RegisterController@Register')->name('post-daftar');
Route::post('/Masuk-Akun', 'Auth\LoginController@Login')->name('post-masuk');
// Akhir Auth

Route::get('/home', 'HomeController@index')->name('home');

// User
Route::prefix('user')->group(function(){
	Route::get('/dashboard', 'User\UserController@index')->name('user.dashboard');
	
	// Profile
	Route::prefix('profile')->group(function(){
		Route::get('/', 'User\UserController@profile')->name('user.profile');
		Route::post('/post', 'User\UserController@profilePost')->name('user.profile.post');
	});
	// Akhir profile
	
	// Unggah Karya
	Route::prefix('unggahkarya')->group(function(){
		Route::get('/', 'User\UserController@unggahKarya')->name('user.unggah');
		Route::post('/cerpen', 'User\UserController@cerpenPost')->name('user.unggah.cerpen');
		Route::post('/novel', 'User\UserController@novelPost')->name('user.unggah.novel');
		Route::post('/puisi', 'User\UserController@puisiPost')->name('user.unggah.puisi');
	});
	// Akhir Unggah Karya

	// Lihat Karya
	Route::prefix('lihatkarya')->group(function(){
		Route::get('/', 'User\UserController@getKarya')->name('user.lihat.karya');
		
		Route::get('/cerpen', 'User\UserController@getCerpen')->name('user.lihat.cerpen');
		Route::get('/cerpen/{id}', 'User\UserController@bacaCerpen')->name('user.baca.cerpen');

		Route::get('/novel', 'User\UserController@getNovel')->name('user.lihat.novel');
		Route::get('/novel/{id}', 'User\UserController@bacaNovel')->name('user.baca.novel');

		Route::get('/puisi', 'User\UserController@getPuisi')->name('user.lihat.puisi');
		Route::get('/puisi/{id}', 'User\UserController@bacaPuisi')->name('user.baca.puisi');
	});
	// Akhir Lihat Karya

	// Resume Literasi
	Route::prefix('literasi')->group(function(){
		Route::get('/', 'User\UserController@literasi')->name('user.literasi');
		Route::get('/detail/{id}', 'User\UserController@detailLiterasi')->name('user.detail.literasi');
		Route::get('/form', 'User\UserController@formLiterasi')->name('user.formliterasi');
		Route::post('/form/post', 'User\UserController@postLiterasi')->name('user.post.literasi');
	});
	// Akhir Resume Literasi
	
	// Lihat Buku
	Route::prefix('buku')->group(function(){
		Route::get('/', 'User\UserController@lihatBuku')->name('user.klasifikasi.buku');
		Route::get('/lihat', 'User\UserController@getBuku')->name('user.buku');
		Route::get('/detail/{id}', 'User\UserController@buku')->name('user.buku.detail');
	});
	// Akhir lihat buku
});
// Akhir User


// ########################## BATAS USER ################################# //


// Operator
Route::prefix('operator')->group(function(){
    // Dasboard
	Route::get('/dashboard', 'Operator\OperatorController@index')->name('operator.dashboard')->middleware('IsOperator');
	
	// Anggota
	Route::prefix('anggota')->group( function() {
		Route::get('/', 'Operator\DataMaster\AnggotaController@daftarAnggota')->name('operator.anggota')->middleware('IsOperator');
		// DataTable-Anggota
		Route::get('/datatable', 'Operator\DataMaster\AnggotaController@anggotaDatatable')->name('operator.anggota.datatables')->middleware('IsOperator');
		// Tambah-Anggota
		Route::get('/tambah-anggota/store', 'Operator\DataMaster\AnggotaController@anggotaStore')->name('operator.anggota.store')->middleware('IsOperator');
		// Ubah-Anggota
		Route::get('/ubah-anggota/{id}', 'Operator\DataMaster\AnggotaController@anggotaUbah')->name('operator.anggota.ubah')->middleware('IsOperator');
		// Delete
		Route::delete('/delete/{id}', 'Operator\DataMaster\AnggotaController@anggotaDelete')->name('operator.anggota.delete')->middleware('IsOperator');
	});

    // Operator-Biblio
    Route::prefix('biblio')->group(function(){
        // Tampil Biblio
        Route::get('/', 'Operator\DataMaster\BiblioController@daftarbiblio')->name('operator.biblio')->middleware('IsOperator');
        Route::get('/datatable', 'Operator\DataMaster\BiblioController@bibliodatatable')->name('operator.biblio.datatable')->middleware('IsOperator');

        // Tambah Biblio
        Route::post('/simpanbiblio', 'Operator\DataMaster\BiblioController@store')->name('operator.biblio.kirim')->middleware('IsOperator');
        //cari penerbit dan penulis
		Route::get('/penulis/cari', 'Operator\DataMaster\BiblioController@caripenulis')->middleware('IsOperator');
		Route::get('/penerbit/cari', 'Operator\DataMaster\BiblioController@caripenerbit')->middleware('IsOperator');
		Route::get('/sumberitem/cari', 'Operator\DataMaster\BiblioController@carisumberitem')->middleware('IsOperator');
		//ubah biblio
		Route::get('/ubah/biblio/{biblio_id}', 'Operator\DataMaster\BiblioController@edit')->name('operator.biblio.edit')->middleware('IsOperator');
		Route::post('/{id}', 'Operator\DataMaster\BiblioController@update')->name('operator.biblio.ubah')->middleware('IsOperator');
		//detail biblio
		Route::get('/detail/biblio/{id}', 'Operator\DataMaster\BiblioController@show')->name('operator.biblio.detail')->middleware('IsOperator');
		//Export
		Route::get('/export/excel', 'Operator\DataMaster\BiblioController@export')->name('operator.biblio.export')->middleware('IsOperator');
		//Import
		Route::post('/import/excel', 'Operator\DataMaster\BiblioController@import')->name('operator.biblio.import.excel')->middleware('IsOperator');
		//delete 
		Route::post('/hapus/{id}', 'Operator\DataMaster\BiblioController@delete')->name('operator.biblio.hapus')->middleware('IsOperator');
		//datatable riwayat biblio
		Route::get('/riwayat/datatable', 'Operator\DataMaster\BiblioController@riwayatdatatable')->name('operator.biblio.riwayat.datatable')->middleware('IsOperator');
	});
	
	// Operator : Data Pendukung
	Route::prefix('datapendukung')->group(function() {

			// DataPendukung-Anggota
			Route::get('/anggota', 'Operator\DataPendukung\AnggotaPendukungController@anggotaPendukung')->name('operator.anggota.pendukung')->middleware('IsOperator');

			// DataTable-Pendukung Anggota
			Route::get('/datatable/tipe-anggota', 'Operator\DataPendukung\AnggotaPendukungController@tipeAnggotaDatatable')->name('operator.pendukung.datatable.tipeAnggota')->middleware('IsOperator'); 
			Route::get('/datatable/jurusan', 'Operator\DataPendukung\AnggotaPendukungController@jurusanDatatable')->name('operator.pendukung.datatable.jurusan')->middleware('IsOperator'); 
			Route::get('/datatable/kelas', 'Operator\DataPendukung\AnggotaPendukungController@kelasDatatable')->name('operator.pendukung.datatable.kelas')->middleware('IsOperator'); 

			// Ubah DataPendukung
			Route::get('/ubah/anggota-tipe/{id}', 'Operator\DataPendukung\AnggotaPendukungController@ubahAnggotaTipe')->name('operator.ubah.anggota.tipe')->middleware('IsOperator');
			Route::get('/ubah/jurusan/{id}', 'Operator\DataPendukung\AnggotaPendukungController@ubahJurusan')->name('operator.ubah.jurusan')->middleware('IsOperator');
			Route::get('/ubah/kelas/{id}', 'Operator\DataPendukung\AnggotaPendukungController@ubahKelas')->name('operator.ubah.kelas')->middleware('IsOperator');

			// Store DataPendukung
			Route::post('/store/data-pendukung/anggota-tipe', 'Operator\DataPendukung\AnggotaPendukungController@storeDatapendukungTipe')->name('operator.store.DataPendukung.tipe')->middleware('IsOperator');
			Route::post('/store/data-pendukung/jurusan', 'Operator\DataPendukung\AnggotaPendukungController@storeDatapendukungJurusan')->name('operator.store.DataPendukung.jurusan')->middleware('IsOperator');
			Route::post('/store/data-pendukung/kelas', 'Operator\DataPendukung\AnggotaPendukungController@storeDatapendukungKelas')->name('operator.store.DataPendukung.kelas')->middleware('IsOperator');

			// Akhir Data Pendukung Anggota

			//Biblio
			Route::get('/', 'Operator\DataPendukung\BiblioPendukungController@index')->name('operator.pendukung.biblio')->middleware('IsOperator');
			
			//Datatables
			Route::get('/datatable/penulis', 'Operator\DataPendukung\BiblioPendukungController@penulisdatatable')->name('operator.pendukung.datatable.penulis')->middleware('IsOperator');
			Route::get('/datatable/penerbit', 'Operator\DataPendukung\BiblioPendukungController@penerbitdatatable')->name('operator.pendukung.datatable.penerbit')->middleware('IsOperator');
			Route::get('/datatable/statusitem', 'Operator\DataPendukung\BiblioPendukungController@statusitemdatatable')->name('operator.pendukung.datatable.statusitem')->middleware('IsOperator');
			Route::get('/datatable/sumberitem', 'Operator\DataPendukung\BiblioPendukungController@sumberitemdatatable')->name('operator.pendukung.datatable.sumberitem')->middleware('IsOperator');
			Route::get('/datatable/tipekoleksi', 'Operator\DataPendukung\BiblioPendukungController@tipekoleksidatatable')->name('operator.pendukung.datatable.tipekoleksi')->middleware('IsOperator');
			Route::get('/datatable/klasifikasi', 'Operator\DataPendukung\BiblioPendukungController@klasifikasidatatable')->name('operator.pendukung.datatable.klasifikasi')->middleware('IsOperator');
			Route::get('/datatable/statussirkulasi', 'Operator\DataPendukung\BiblioPendukungController@statussirkulasidatatable')->name('operator.pendukung.datatable.statussirkulasi')->middleware('IsOperator');
			
			//Proses Data
			Route::post('/biblio/penulis/proses', 'Operator\DataPendukung\BiblioPendukungController@storePenulis')->name('operator.pendukung.biblio.penulis.proses')->middleware('IsOperator');
			Route::post('/biblio/penerbit/proses', 'Operator\DataPendukung\BiblioPendukungController@storePenerbit')->name('operator.pendukung.biblio.penerbit.proses')->middleware('IsOperator');
			Route::post('biblio/klasifikasi/proses', 'Operator\DataPendukung\BiblioPendukungController@storeKlasifikasi')->name('operator.pendukung.biblio.klasifikasi.proses')->middleware('IsOperator');
			Route::post('/biblio/tipekoleksi/proses', 'Operator\DataPendukung\BiblioPendukungController@storeTipekoleksi')->name('operator.pendukung.biblio.tipekoleksi.proses')->middleware('IsOperator');
			Route::post('/biblio/statusitem/proses', 'Operator\DataPendukung\BiblioPendukungController@storeStatusitem')->name('operator.pendukung.biblio.statusitem.proses')->middleware('IsOperator');
			Route::post('/biblio/sumberitem/proses', 'Operator\DataPendukung\BiblioPendukungController@storeSumberitem')->name('operator.pendukung.biblio.sumberitem.proses')->middleware('IsOperator');
			Route::post('/biblio/statussirkulasi/proses', 'Operator\DataPendukung\BiblioPendukungController@storeStatusSirkulasi')->name('operator.pendukung.biblio.statussirkulasi.proses')->middleware('IsOperator');
			
			//ubah data
			Route::get('/biblio/penulis/ubah/{id}', 'Operator\DataPendukung\BiblioPendukungController@editPenulis')->name('operator.pendukung.biblio.penulis.edit')->middleware('IsOperator');
			Route::get('/biblio/penerbit/ubah/{id}', 'Operator\DataPendukung\BiblioPendukungController@editPenerbit')->name('operator.pendukung.biblio.penerbit.edit')->middleware('IsOperator');
			Route::get('/biblio/klasifikasi/ubah/{id}', 'Operator\DataPendukung\BiblioPendukungController@editKlasifikasi')->name('operator.pendukung.biblio.klasifikasi.edit')->middleware('IsOperator');
			Route::get('/biblio/klasifikasi/ubah/{id}', 'Operator\DataPendukung\BiblioPendukungController@editKlasifikasi')->name('operator.pendukung.biblio.klasifikasi.edit')->middleware('IsOperator');
			Route::get('/biblio/tipekoleksi/ubah/{id}', 'Operator\DataPendukung\BiblioPendukungController@editTipekoleksi')->name('operator.pendukung.biblio.tipekoleksi.edit')->middleware('IsOperator');
			Route::get('/biblio/sumberitem/ubah/{id}', 'Operator\DataPendukung\BiblioPendukungController@editSumberitem')->name('operator.pendukung.biblio.sumberitem.edit')->middleware('IsOperator');
			Route::get('/biblio/statusitem/ubah/{id}', 'Operator\DataPendukung\BiblioPendukungController@editStatusitem')->name('operator.pendukung.biblio.statusitem.edit')->middleware('IsOperator');
			Route::get('/biblio/statussirkulasi/ubah/{id}', 'Operator\DataPendukung\BiblioPendukungController@editStatussirkulasi')->name('operator.pendukung.biblio.statussirkulasi.edit')->middleware('IsOperator');
			
			//Datatables riwayat
			Route::get('/biblio/riwayat/datatables/penulis', 'Operator\DataPendukung\BiblioPendukungController@penulisRiwayatData')->name('operator.pendukung.biblio.penulis.datatables.riwayat')->middleware('IsOperator');
			Route::get('biblio/riwayat/datatables/penerbit', 'Operator\DataPendukung\BiblioPendukungController@penerbitRiwayatData')->name('operator.pendukung.biblio.penerbit.datatables.riwayat')->middleware('IsOperator');
			Route::get('biblio/riwayat/datatables/statusitem', 'Operator\DataPendukung\BiblioPendukungController@statusitemRiwayatData')->name('operator.pendukung.biblio.statusitem.datatables.riwayat')->middleware('IsOperator');
			Route::get('biblio/riwayat/datatables/sumberitem', 'Operator\DataPendukung\BiblioPendukungController@sumberitemRiwayatData')->name('operator.pendukung.biblio.sumberitem.datatables.riwayat')->middleware('IsOperator');
			Route::get('biblio/riwayat/datatables/klasifikasi', 'Operator\DataPendukung\BiblioPendukungController@klasifikasiRiwayatData')->name('operator.pendukung.biblio.klasifikasi.datatables.riwayat')->middleware('IsOperator');
			Route::get('biblio/riwayat/datatables/tipekoleksi', 'Operator\DataPendukung\BiblioPendukungController@tipekoleksiRiwayatData')->name('operator.pendukung.biblio.tipekoleksi.datatables.riwayat')->middleware('IsOperator');
			Route::get('biblio/riwayat/datatables/statussirkulasi', 'Operator\DataPendukung\BiblioPendukungController@statussirkulasiRiwayatData')->name('operator.pendukung.biblio.statussirkulasi.datatables.riwayat')->middleware('IsOperator');

			// Hapus
			Route::post('/hapus/penulis/{id}', 'Operator\DataPendukung\BiblioPendukungController@deletePenulis')->name('operator.pendukung.penulis.hapus')->middleware('IsOperator');
			Route::post('/hapus/penerbit/{id}', 'Operator\DataPendukung\BiblioPendukungController@deletePenerbit')->name('operator.pendukung.penerbit.hapus')->middleware('IsOperator');
			Route::post('/hapus/klasifikasi/{id}', 'Operator\DataPendukung\BiblioPendukungController@deleteKlasifikasi')->name('operator.pendukung.klasifikasi.hapus')->middleware('IsOperator');
			Route::post('/hapus/statusitem/{id}', 'Operator\DataPendukung\BiblioPendukungController@deleteStatusItem')->name('operator.pendukung.statusitem.hapus')->middleware('IsOperator');
			Route::post('/hapus/statusirkulasi/{id}', 'Operator\DataPendukung\BiblioPendukungController@deleteStatusSirkulasi')->name('operator.pendukung.statussirkulasi.hapus')->middleware('IsOperator');
			Route::post('/hapus/sumberitem/{id}', 'Operator\DataPendukung\BiblioPendukungController@deleteSumberItem')->name('operator.pendukung.sumberitem.hapus')->middleware('IsOperator');
			Route::post('/hapus/tipekoleksi/{id}', 'Operator\DataPendukung\BiblioPendukungController@deleteTipeKoleksi')->name('operator.pendukung.tipekoleksi.hapus')->middleware('IsOperator');
		// Akhir Biblio
	});

	Route::prefix('pengaturan')->group( function() {
		// Edit Data-Profile
		Route::get('/profile/{id}', 'Operator\Pengaturan\ProfileController@profile')->name('anggota.profile');
		Route::post('/profile/update/{id}', 'Operator\Pengaturan\ProfileController@profileUpdate')->name('anggota.profile.update');
	
		// Edit Foto-Profile
		Route::get('/foto/edit/{id}', 'Operator\Pengaturan\ProfileController@fotoEdit')->name('anggota.foto.ubah');
		Route::post('/foto/update/{id}', 'Operator\Pengaturan\ProfileController@fotoUpdate')->name('anggota.foto.update');
	
		// Pengaturan Sistem
		Route::get('/sistem/{id}', 'Operator\Pengaturan\SistemController@index')->name('operator.sistem');
		Route::post('/sistem/update/{id}', 'Operator\Pengaturan\SistemController@sistemUpdate')->name('operator.sistem.update');
	});

	// Sirkulasi
	Route::prefix('sirkulasi')->group(function(){
		// Peminjaman
		Route::get('/', 'Operator\DataSirkulasi\SirkulasiController@peminjaman')->name('operator.sirkulasi')->middleware('IsOperator');
		Route::get('/perpanjangan/{id}', 'Operator\DataSirkulasi\SirkulasiController@perpanjangan')->name('operator.sirkulasi.perpanjangan')->middleware('IsOperator');
		Route::post('/perpanjangan/update/{id}', 'Operator\DataSirkulasi\SirkulasiController@perpanjanganProses')->name('operator.sirkulasi.perpanjangan.proses')->middleware('IsOperator');
		Route::post('/peminjaman/proses', 'Operator\DataSirkulasi\SirkulasiController@peminjamanProses')->name('operator.sirkulasi.peminjaman.proses')->middleware('IsOperator');
		// Search Ajax
		Route::get('/search/anggota', 'Operator\DataSirkulasi\SirkulasiController@searchAnggota')->name('operator.sirkulasi.search.anggota')->middleware('IsOperator');
		Route::get('/search/biblio', 'Operator\DataSirkulasi\SirkulasiController@searchBiblio')->middleware('IsOperator');
		// Pengembalian
		Route::get('/search/biblio/back', 'Operator\DataSirkulasi\SirkulasiController@searchBiblioBack')->name('operator.sirkulasi.searchbiblio.kembali')->middleware('IsOperator');
		Route::post('/pengembalian/proses', 'Operator\DataSirkulasi\SirkulasiController@pengembalianProses')->name('operator.sirkulasi.pengembalian.proses')->middleware('IsOperator');
		// Riwayat Datatable
		Route::get('/riwayat/peminjaman', 'Operator\DataSirkulasi\SirkulasiController@riwayatPeminjaman')->name('operator.sirkulasi.riwayat.peminjaman')->middleware('IsOperator');
		Route::get('/riwayat/pengembalian', 'Operator\DataSirkulasi\SirkulasiController@riwayatPengembalian')->name('operator.sirkulasi.riwayat.pengembalian')->middleware('IsOperator');
	});

	// Novel
	Route::prefix('novel')->group(function(){
		// Data Novel
		Route::get('/', 'Operator\NovelController@index')->name('operator.novel')->middleware('IsOperator');
		Route::get('/datatable', 'Operator\NovelController@createDatatable')->name('operator.novel.datatable')->middleware('IsOperator');
		Route::post('/update', 'Operator\NovelController@store')->name('operator.novel.store')->middleware('IsOperator');
		Route::get('/detail/{id}', 'Operator\NovelController@edit')->name('operator.novel.edit')->middleware('IsOperator');
		Route::post('/konfirmasi/{id}', 'Operator\NovelController@konfirmasi')->name('operator.novel.konfirmasi')->middleware('IsOperator');
		Route::delete('/hapus/{id}', 'Operator\NovelController@destroy')->name('operator.novel.hapus')->middleware('IsOperator');
	});

	// Cerpen
	Route::prefix('cerpen')->group(function(){
		// Data Cerpen
		Route::get('/', 'Operator\CerpenController@index')->name('operator.cerpen')->middleware('IsOperator');
		Route::get('/datatable', 'Operator\CerpenController@createDatatable')->name('operator.cerpen.datatable')->middleware('IsOperator');
		Route::post('/update', 'Operator\CerpenController@store')->name('operator.cerpen.store')->middleware('IsOperator');
		Route::get('/detail/{id}', 'Operator\CerpenController@edit')->name('operator.cerpen.edit')->middleware('IsOperator');
		Route::post('/konfirmasi/{id}', 'Operator\CerpenController@konfirmasi')->name('operator.cerpen.konfirmasi')->middleware('IsOperator');
		Route::delete('/hapus/{id}', 'Operator\CerpenController@destroy')->name('operator.cerpen.hapus')->middleware('IsOperator');
	});

	// Cerpen
	Route::prefix('puisi')->group(function(){
		// Data Puisi
		Route::get('/', 'Operator\PuisiController@index')->name('operator.puisi')->middleware('IsOperator');
		Route::get('/datatable', 'Operator\PuisiController@createDatatable')->name('operator.puisi.datatable')->middleware('IsOperator');
		Route::post('/update', 'Operator\PuisiController@store')->name('operator.puisi.store')->middleware('IsOperator');
		Route::get('/detail/{id}', 'Operator\PuisiController@edit')->name('operator.puisi.edit')->middleware('IsOperator');
		Route::post('/konfirmasi/{id}', 'Operator\PuisiController@konfirmasi')->name('operator.puisi.konfirmasi')->middleware('IsOperator');
		Route::delete('/hapus/{id}', 'Operator\PuisiController@destroy')->name('operator.puisi.hapus')->middleware('IsOperator');
	});

	// Resume
	Route::prefix('resume')->group(function(){
		// Data Resume
		Route::get('/', 'Operator\ResumeController@index')->name('operator.resume')->middleware('IsOperator');
		Route::get('/datatable', 'Operator\ResumeController@createDatatable')->name('operator.resume.datatable')->middleware('IsOperator');
		Route::get('/edit/{id}', 'Operator\ResumeController@edit')->name('operator.resume.edit')->middleware('IsOperator');
		Route::post('/update', 'Operator\ResumeController@store')->name('operator.resume.store')->middleware('IsOperator');
		Route::delete('/hapus/{id}', 'Operator\ResumeController@destroy')->name('operator.resume.hapus')->middleware('IsOperator');
	});

});
// Akhir Operator


// ########################## BATAS OPERATOR ################################# //




