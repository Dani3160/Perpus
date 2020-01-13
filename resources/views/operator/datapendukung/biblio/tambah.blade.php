@extends('layouts.operator.master')
@section('judul')
	Tambah Data Pendukung Biblio - Operator
@stop

@section('konten')
	<div class="row">
		<div class="col-md-6 col-sm-6 col-xs-12">
			<a href="{{ route('operator.pendukung.biblio') }}" class="btn btn-warning">Kembali</a>
		</div>
		<div class="col-md-6 col-sm-6 col-xs-12">
			<h2 class="navbar-right">Tambah Data Pendukung Biblio</h2>
		</div>
	</div>
	<div class="row">
		{{-- Tabel Penulis --}}
			<div class="col-md-6 col-sm-6 col-xs-12">
			  <div class="x_panel">
			    <div class="x_title">
			      <h2>Tambah Penulis</h2>
			      <ul class="nav navbar-right panel_toolbox">
			        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
			        </li>
			        <li><a class="close-link"><i class="fa fa-close"></i></a>
			        </li>
			      </ul>
			      <div class="clearfix"></div>
			    </div>
			    <div class="x_content">
                    <form action="{{ route('operator.pendukung.biblio.penulis.proses') }}" method="POST">
                    	@csrf
                    	<div class="form-group">
                    		<label for="penulis_nama">Nama Penulis*</label>
                    		<input type="text" name="penulis_nama" class="form-control" value="{{ old('penulis_nama') }}" autocomplete="off">
                    	</div>	
                    	<button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
			    </div>
			  </div>
			</div>
		{{-- Bagian Akhir Tabel Penulis --}}

		{{-- Tabel penerbit --}}
			<div class="col-md-6 col-sm-6 col-xs-12">
			  <div class="x_panel">
			    <div class="x_title">
			      <h2>Tambah Penerbit</h2>
			      <ul class="nav navbar-right panel_toolbox">
			        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
			        </li>
			        <li><a class="close-link"><i class="fa fa-close"></i></a>
			        </li>
			      </ul>
			      <div class="clearfix"></div>
			    </div>
			    <div class="x_content">
                    <form action="{{ route('operator.pendukung.biblio.penerbit.proses') }}" method="POST">
                    	@csrf
                    	<div class="form-group">
                    		<label for="penerbit_nama">Nama Penerbit*</label>
                    		<input type="text" name="penerbit_nama" class="form-control" value="{{ old('penerbit_nama') }}" autocomplete="off">
                    	</div>	
                    	<button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
			    </div>
			  </div>
			</div>
		{{-- Bagian Akhir Tabel Penerbit --}}
	</div>
	<div class="row">
		{{-- Tabel klasifikasi --}}
			<div class="col-md-6 col-sm-6 col-xs-12">
			  <div class="x_panel">
			    <div class="x_title">
			      <h2>Tambah Klasifikasi</h2>
			      <ul class="nav navbar-right panel_toolbox">
			        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
			        </li>
			        <li><a class="close-link"><i class="fa fa-close"></i></a>
			        </li>
			      </ul>
			      <div class="clearfix"></div>
			    </div>
			    <div class="x_content">
                    <form action="{{ route('operator.pendukung.biblio.klasifikasi.proses') }}" method="POST">
                    	@csrf
                    	<div class="form-group">
                    		<label for="klasifikasi_nama">Nama klasifikasi*</label>
                    		<input type="text" name="klasifikasi_nama" class="form-control" value="{{ old('klasifikasi_nama') }}" autocomplete="off">
                    	</div>	
                    	<button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
			    </div>
			  </div>
			</div>
		{{-- Bagian Akhir Tabel klasifikasi --}}

		{{-- Tabel tipekoleksi --}}
			<div class="col-md-6 col-sm-6 col-xs-12">
			  <div class="x_panel">
			    <div class="x_title">
			      <h2>Tambah Tipe Koleksi</h2>
			      <ul class="nav navbar-right panel_toolbox">
			        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
			        </li>
			        <li><a class="close-link"><i class="fa fa-close"></i></a>
			        </li>
			      </ul>
			      <div class="clearfix"></div>
			    </div>
			    <div class="x_content">
                    <form action="{{ route('operator.pendukung.biblio.tipekoleksi.proses') }}" method="POST">
                    	@csrf
                    	<div class="form-group">
                    		<label for="tipekoleksi_nama">Nama tipekoleksi*</label>
                    		<input type="text" name="tipekoleksi_nama" class="form-control" value="{{ old('tipekoleksi_nama') }}" autocomplete="off">
                    	</div>	
                    	<button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
			    </div>
			  </div>
			</div>
		{{-- Bagian Akhir Tabel tipekoleksi --}}
	</div>
	<div class="row">
		{{-- Tabel sumber item --}}
			<div class="col-md-6 col-sm-6 col-xs-12">
			  <div class="x_panel">
			    <div class="x_title">
			      <h2>Tambah Sumber Item</h2>
			      <ul class="nav navbar-right panel_toolbox">
			        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
			        </li>
			        <li><a class="close-link"><i class="fa fa-close"></i></a>
			        </li>
			      </ul>
			      <div class="clearfix"></div>
			    </div>
			    <div class="x_content">
                    <form action="{{ route('operator.pendukung.biblio.sumberitem.proses') }}" method="POST">
                    	@csrf
                    	<div class="form-group">
                    		<label for="sumber_item_nama">Sumber Item Buku*</label>
                    		<input type="text" name="sumber_item_nama" class="form-control" value="{{ old('sumber_item_nama') }}" autocomplete="off">
                    	</div>	
                    	<button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
			    </div>
			  </div>
			</div>
		{{-- Bagian Akhir Tabel sumber item --}}

		{{-- Tabel Status Item --}}
			<div class="col-md-6 col-sm-6 col-xs-12">
			  <div class="x_panel">
			    <div class="x_title">
			      <h2>Tambah Status Item</h2>
			      <ul class="nav navbar-right panel_toolbox">
			        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
			        </li>
			        <li><a class="close-link"><i class="fa fa-close"></i></a>
			        </li>
			      </ul>
			      <div class="clearfix"></div>
			    </div>
			    <div class="x_content">
                    <form action="{{ route('operator.pendukung.biblio.statusitem.proses') }}" method="POST">
                    	@csrf
                    	<div class="form-group">
                    		<label for="status_item_nama">Status Item Buku*</label>
                    		<input type="text" name="status_item_nama" class="form-control" value="{{ old('status_item_nama') }}" autocomplete="off">
                    	</div>	
                    	<button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
			    </div>
			  </div>
			</div>
		{{-- Bagian Akhir Tabel Status Item --}}

		{{-- Tabel Status Sirkulasi --}}
			<div class="col-md-6 col-sm-6 col-xs-12">
			  <div class="x_panel">
			    <div class="x_title">
			      <h2>Tambah Status Sirkulasi</h2>
			      <ul class="nav navbar-right panel_toolbox">
			        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
			        </li>
			        <li><a class="close-link"><i class="fa fa-close"></i></a>
			        </li>
			      </ul>
			      <div class="clearfix"></div>
			    </div>
			    <div class="x_content">
                    <form action="{{ route('operator.pendukung.biblio.statussirkulasi.proses') }}" method="POST">
                    	@csrf
                    	<div class="form-group">
                    		<label for="status_item_nama">Status Sirkulasi*</label>
                    		<input type="text" name="status_sirkulasi_nama" class="form-control" value="{{ old('status_sirkulasi_nama') }}" autocomplete="off">
                    	</div>	
                    	<button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
			    </div>
			  </div>
			</div>
		{{-- Bagian Akhir Tabel Status Item --}}
	</div>
@stop