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

Route::get('/', function () {
    return view('user.landing');
});


//Auth
Route::get('/Masuk', 'Auth\LoginController@ShowMasukForm')->name('Masuk');
Route::get('/Daftar', 'Auth\RegisterController@ShowDaftarForm')->name('Daftar');
Route::post('/Daftar-Akun', 'Auth\RegisterController@Register')->name('post-daftar');
Route::post('/Masuk-Akun', 'Auth\LoginController@Login')->name('post-masuk');
Route::get('/Keluar', 'Auth\LoginController@Keluar')->name('Keluar');

Route::get('/jurusan', 'Auth\LoginController@getJurusan')->name('Jurusan');

//Email
Route::get('/email', function () {
    return view('layouts.email.send_email');
});
Route::post('/sendEmail', 'Auth\EmailController@sendEmail');

//lupa sandi
Route::get('/lupa-sandi', 'Auth\ForgotPasswordController@showForm')->name('konfirmasi_kode_lupasandi');
Route::post('/lupa-sandi/kirim-kode', 'Auth\ForgotPasswordController@sandibaru')->name('sandibaru');

//verifikasi
Route::get('/verifikasi', 'Auth\VerificationController@showverifikasi')->name('verifikasi');
Route::post('/verifikasi/kirim-kode', 'Auth\VerificationController@kirimverifikasi')->name('kirim-kode-verifi');
Route::get('/verifikasi/konfirmasi', 'Auth\VerificationController@konfirmasishowverifikasi')->name('konfirmasi-show-kode-verifi');
Route::post('/verifikasi/konfirmasi-kode', 'Auth\VerificationController@konfirmasiverifikasi')->name('konfirmasi-kode-verifi');

// Logout
Route::get('/logout', 'Auth\LoginController@Keluar')->name('logout');

// Operator
Route::prefix('operator')->group(function(){
    // Dasboard
	Route::get('/dashboard', 'Operator\OperatorController@index')->name('operator.dashboard');
	
	// Anggota
	Route::prefix('anggota')->group( function() {
		Route::get('/', 'Operator\DataMaster\AnggotaController@daftarAnggota')->name('operator.anggota');
		// DataTable-Anggota
		Route::get('/datatable', 'Operator\DataMaster\AnggotaController@anggotaDatatable')->name('operator.anggota.datatables');
		// Tambah-Anggota
		Route::get('/tambah-anggota/store', 'Operator\DataMaster\AnggotaController@anggotaStore')->name('operator.anggota.store');
		// Ubah-Anggota
		Route::get('/ubah-anggota/{id}', 'Operator\DataMaster\AnggotaController@anggotaUbah')->name('operator.anggota.ubah');
		// Delete
		Route::delete('/delete/{id}', 'Operator\DataMaster\AnggotaController@anggotaDelete')->name('operator.anggota.delete');
	});

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
		Route::post('/import/excel', 'Operator\DataMaster\BiblioController@import')->name('operator.biblio.import.excel');
		//delete 
		Route::post('/hapus/{id}', 'Operator\DataMaster\BiblioController@delete')->name('operator.biblio.hapus');
		//datatable riwayat biblio
		Route::get('/riwayat/datatable', 'Operator\DataMaster\BiblioController@riwayatdatatable')->name('operator.biblio.riwayat.datatable');
	});
	
	// Operator : Data Pendukung
	Route::prefix('datapendukung')->group(function() {

			// DataPendukung-Anggota
			Route::get('/anggota', 'Operator\DataPendukung\AnggotaPendukungController@anggotaPendukung')->name('operator.anggota.pendukung');

			// DataTable-Pendukung Anggota
			Route::get('/datatable/tipe-anggota', 'Operator\DataPendukung\AnggotaPendukungController@tipeAnggotaDatatable')->name('operator.pendukung.datatable.tipeAnggota'); 
			Route::get('/datatable/jurusan', 'Operator\DataPendukung\AnggotaPendukungController@jurusanDatatable')->name('operator.pendukung.datatable.jurusan'); 
			Route::get('/datatable/kelas', 'Operator\DataPendukung\AnggotaPendukungController@kelasDatatable')->name('operator.pendukung.datatable.kelas'); 

			// Ubah DataPendukung
			Route::get('/ubah/anggota-tipe/{id}', 'Operator\DataPendukung\AnggotaPendukungController@ubahAnggotaTipe')->name('operator.ubah.anggota.tipe');
			Route::get('/ubah/jurusan/{id}', 'Operator\DataPendukung\AnggotaPendukungController@ubahJurusan')->name('operator.ubah.jurusan');
			Route::get('/ubah/kelas/{id}', 'Operator\DataPendukung\AnggotaPendukungController@ubahKelas')->name('operator.ubah.kelas');

			// Store DataPendukung
			Route::post('/store/data-pendukung/anggota-tipe', 'Operator\DataPendukung\AnggotaPendukungController@storeDatapendukungTipe')->name('operator.store.DataPendukung.tipe');
			Route::post('/store/data-pendukung/jurusan', 'Operator\DataPendukung\AnggotaPendukungController@storeDatapendukungJurusan')->name('operator.store.DataPendukung.jurusan');
			Route::post('/store/data-pendukung/kelas', 'Operator\DataPendukung\AnggotaPendukungController@storeDatapendukungKelas')->name('operator.store.DataPendukung.kelas');

			// Akhir Data Pendukung Anggota

			//Biblio
			Route::get('/', 'Operator\DataPendukung\BiblioPendukungController@index')->name('operator.pendukung.biblio');
			
			//Datatables
			Route::get('/datatable/penulis', 'Operator\DataPendukung\BiblioPendukungController@penulisdatatable')->name('operator.pendukung.datatable.penulis');
			Route::get('/datatable/penerbit', 'Operator\DataPendukung\BiblioPendukungController@penerbitdatatable')->name('operator.pendukung.datatable.penerbit');
			Route::get('/datatable/statusitem', 'Operator\DataPendukung\BiblioPendukungController@statusitemdatatable')->name('operator.pendukung.datatable.statusitem');
			Route::get('/datatable/sumberitem', 'Operator\DataPendukung\BiblioPendukungController@sumberitemdatatable')->name('operator.pendukung.datatable.sumberitem');
			Route::get('/datatable/tipekoleksi', 'Operator\DataPendukung\BiblioPendukungController@tipekoleksidatatable')->name('operator.pendukung.datatable.tipekoleksi');
			Route::get('/datatable/klasifikasi', 'Operator\DataPendukung\BiblioPendukungController@klasifikasidatatable')->name('operator.pendukung.datatable.klasifikasi');
			Route::get('/datatable/statussirkulasi', 'Operator\DataPendukung\BiblioPendukungController@statussirkulasidatatable')->name('operator.pendukung.datatable.statussirkulasi');
			
			//Proses Data
			Route::post('/biblio/penulis/proses', 'Operator\DataPendukung\BiblioPendukungController@storePenulis')->name('operator.pendukung.biblio.penulis.proses');
			Route::post('/biblio/penerbit/proses', 'Operator\DataPendukung\BiblioPendukungController@storePenerbit')->name('operator.pendukung.biblio.penerbit.proses');
			Route::post('biblio/klasifikasi/proses', 'Operator\DataPendukung\BiblioPendukungController@storeKlasifikasi')->name('operator.pendukung.biblio.klasifikasi.proses');
			Route::post('/biblio/tipekoleksi/proses', 'Operator\DataPendukung\BiblioPendukungController@storeTipekoleksi')->name('operator.pendukung.biblio.tipekoleksi.proses');
			Route::post('/biblio/statusitem/proses', 'Operator\DataPendukung\BiblioPendukungController@storeStatusitem')->name('operator.pendukung.biblio.statusitem.proses');
			Route::post('/biblio/sumberitem/proses', 'Operator\DataPendukung\BiblioPendukungController@storeSumberitem')->name('operator.pendukung.biblio.sumberitem.proses');
			Route::post('/biblio/statussirkulasi/proses', 'Operator\DataPendukung\BiblioPendukungController@storeStatusSirkulasi')->name('operator.pendukung.biblio.statussirkulasi.proses');
			
			//ubah data
			Route::get('/biblio/penulis/ubah/{id}', 'Operator\DataPendukung\BiblioPendukungController@editPenulis')->name('operator.pendukung.biblio.penulis.edit');
			Route::get('/biblio/penerbit/ubah/{id}', 'Operator\DataPendukung\BiblioPendukungController@editPenerbit')->name('operator.pendukung.biblio.penerbit.edit');
			Route::get('/biblio/klasifikasi/ubah/{id}', 'Operator\DataPendukung\BiblioPendukungController@editKlasifikasi')->name('operator.pendukung.biblio.klasifikasi.edit');
			Route::get('/biblio/klasifikasi/ubah/{id}', 'Operator\DataPendukung\BiblioPendukungController@editKlasifikasi')->name('operator.pendukung.biblio.klasifikasi.edit');
			Route::get('/biblio/tipekoleksi/ubah/{id}', 'Operator\DataPendukung\BiblioPendukungController@editTipekoleksi')->name('operator.pendukung.biblio.tipekoleksi.edit');
			Route::get('/biblio/sumberitem/ubah/{id}', 'Operator\DataPendukung\BiblioPendukungController@editSumberitem')->name('operator.pendukung.biblio.sumberitem.edit');
			Route::get('/biblio/statusitem/ubah/{id}', 'Operator\DataPendukung\BiblioPendukungController@editStatusitem')->name('operator.pendukung.biblio.statusitem.edit');
			Route::get('/biblio/statussirkulasi/ubah/{id}', 'Operator\DataPendukung\BiblioPendukungController@editStatussirkulasi')->name('operator.pendukung.biblio.statussirkulasi.edit');
			
			//Datatables riwayat
			Route::get('/biblio/riwayat/datatables/penulis', 'Operator\DataPendukung\BiblioPendukungController@penulisRiwayatData')->name('operator.pendukung.biblio.penulis.datatables.riwayat');
			Route::get('biblio/riwayat/datatables/penerbit', 'Operator\DataPendukung\BiblioPendukungController@penerbitRiwayatData')->name('operator.pendukung.biblio.penerbit.datatables.riwayat');
			Route::get('biblio/riwayat/datatables/statusitem', 'Operator\DataPendukung\BiblioPendukungController@statusitemRiwayatData')->name('operator.pendukung.biblio.statusitem.datatables.riwayat');
			Route::get('biblio/riwayat/datatables/sumberitem', 'Operator\DataPendukung\BiblioPendukungController@sumberitemRiwayatData')->name('operator.pendukung.biblio.sumberitem.datatables.riwayat');
			Route::get('biblio/riwayat/datatables/klasifikasi', 'Operator\DataPendukung\BiblioPendukungController@klasifikasiRiwayatData')->name('operator.pendukung.biblio.klasifikasi.datatables.riwayat');
			Route::get('biblio/riwayat/datatables/tipekoleksi', 'Operator\DataPendukung\BiblioPendukungController@tipekoleksiRiwayatData')->name('operator.pendukung.biblio.tipekoleksi.datatables.riwayat');
			Route::get('biblio/riwayat/datatables/statussirkulasi', 'Operator\DataPendukung\BiblioPendukungController@statussirkulasiRiwayatData')->name('operator.pendukung.biblio.statussirkulasi.datatables.riwayat');

			// Hapus
			Route::post('/hapus/penulis/{id}', 'Operator\DataPendukung\BiblioPendukungController@deletePenulis')->name('operator.pendukung.penulis.hapus');
			Route::post('/hapus/penerbit/{id}', 'Operator\DataPendukung\BiblioPendukungController@deletePenerbit')->name('operator.pendukung.penerbit.hapus');
			Route::post('/hapus/klasifikasi/{id}', 'Operator\DataPendukung\BiblioPendukungController@deleteKlasifikasi')->name('operator.pendukung.klasifikasi.hapus');
			Route::post('/hapus/statusitem/{id}', 'Operator\DataPendukung\BiblioPendukungController@deleteStatusItem')->name('operator.pendukung.statusitem.hapus');
			Route::post('/hapus/statusirkulasi/{id}', 'Operator\DataPendukung\BiblioPendukungController@deleteStatusSirkulasi')->name('operator.pendukung.statussirkulasi.hapus');
			Route::post('/hapus/sumberitem/{id}', 'Operator\DataPendukung\BiblioPendukungController@deleteSumberItem')->name('operator.pendukung.sumberitem.hapus');
			Route::post('/hapus/tipekoleksi/{id}', 'Operator\DataPendukung\BiblioPendukungController@deleteTipeKoleksi')->name('operator.pendukung.tipekoleksi.hapus');
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
		Route::get('/', 'Operator\DataSirkulasi\SirkulasiController@peminjaman')->name('operator.sirkulasi');
		Route::get('/perpanjangan/{id}', 'Operator\DataSirkulasi\SirkulasiController@perpanjangan')->name('operator.sirkulasi.perpanjangan');
		Route::post('/perpanjangan/update/{id}', 'Operator\DataSirkulasi\SirkulasiController@perpanjanganProses')->name('operator.sirkulasi.perpanjangan.proses');
		Route::post('/peminjaman/proses', 'Operator\DataSirkulasi\SirkulasiController@peminjamanProses')->name('operator.sirkulasi.peminjaman.proses');
		// Search Ajax
		Route::get('/search/anggota', 'Operator\DataSirkulasi\SirkulasiController@searchAnggota')->name('operator.sirkulasi.search.anggota');
		Route::get('/search/biblio', 'Operator\DataSirkulasi\SirkulasiController@searchBiblio');
		// Pengembalian
		Route::get('/search/biblio/back', 'Operator\DataSirkulasi\SirkulasiController@searchBiblioBack')->name('operator.sirkulasi.searchbiblio.kembali');
		Route::post('/pengembalian/proses', 'Operator\DataSirkulasi\SirkulasiController@pengembalianProses')->name('operator.sirkulasi.pengembalian.proses');
		// Riwayat Datatable
		Route::get('/riwayat/peminjaman', 'Operator\DataSirkulasi\SirkulasiController@riwayatPeminjaman')->name('operator.sirkulasi.riwayat.peminjaman');
		Route::get('/riwayat/pengembalian', 'Operator\DataSirkulasi\SirkulasiController@riwayatPengembalian')->name('operator.sirkulasi.riwayat.pengembalian');
	});

	// Novel
	Route::prefix('novel')->group(function(){
		// Data Novel
		Route::get('/', 'Operator\NovelController@index')->name('operator.novel');
		Route::get('/datatable', 'Operator\NovelController@createDatatable')->name('operator.novel.datatable');
		Route::post('/update', 'Operator\NovelController@store')->name('operator.novel.store');
		Route::get('/detail/{id}', 'Operator\NovelController@edit')->name('operator.novel.edit');
		Route::post('/konfirmasi/{id}', 'Operator\NovelController@konfirmasi')->name('operator.novel.konfirmasi');
		Route::delete('/hapus/{id}', 'Operator\NovelController@destroy')->name('operator.novel.hapus');
	});

	// Resume
	Route::prefix('resume')->group(function(){
		// Data Resume
		Route::get('/', 'Operator\ResumeController@index')->name('operator.resume');
		Route::get('/datatable', 'Operator\ResumeController@createDatatable')->name('operator.resume.datatable');
		Route::get('/edit/{id}', 'Operator\ResumeController@edit')->name('operator.resume.edit');
		Route::post('/update', 'Operator\ResumeController@store')->name('operator.resume.store');
		Route::delete('/hapus/{id}', 'Operator\ResumeController@destroy')->name('operator.resume.hapus');
	});

});

// User
Route::prefix('user')->group(function(){
	Route::get('/dashboard', 'User\UserController@index')->name('user.dashboard');

	// Unggah Karya
	Route::prefix('unggahkarya')->group(function(){
		Route::get('/', 'User\UserController@unggahKarya')->name('user.unggah');
		Route::get('/novel', 'User\UserController@formNovel')->name('user.unggah.novel');
		Route::get('/cerpen', 'User\UserController@formCerpen')->name('user.unggah.cerpen');
		Route::get('/puisi', 'User\UserController@formPuisi')->name('user.unggah.puisi');
	});
	
});

