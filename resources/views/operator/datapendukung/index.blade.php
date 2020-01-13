<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>
		Tambah Data List
	</title>
	{{-- CSS Kustom DataMaster --}}
	<link rel="stylesheet" href="{{ asset('css/datamaster.css') }}">
</head>
<body>
	{{-- Form Tabel Penerbit --}}
		<div class="column">
			<div class="card">
				<h4>Penerbit</h4>
				<form action="{{ route('penerbit.tambah') }}" method="POST">
				@csrf
				<label for="penerbit_nama">Nama Penerbit: </label>
				<input type="text" name="penerbit_nama" class="@error('penerbit_nama') is-invalid @enderror" value="{{ old('penerbit_nama') }}"> <br/>
				@error('penerbit_nama')
					<span class="invalid-feedback" role="alert">
						<strong>{{ $message }}</strong>
					</span>
				@enderror
				<br/>
				<button type="submit">Simpan</button>
			</form>
			</div>
		</div>
	{{-- Batas Akhir Form Tabel Penerbit --}}

	{{-- Form Tabel Penulis --}}
		<div class="column">
			<div class="card">
				<h4>Penulis</h4>
				<form action="{{ route('penulis.tambah') }}" method="POST">
					@csrf	
					<label for="penulis_nama">Nama Penulis:</label>
					<input type="text" name="penulis_nama" class="@error('penulis_nama') is-invalid @enderror" value="{{ old('penulis_nama') }}"> <br/>
					@error('penulis_nama')
						<span class="invalid-feedback" role="alert">
							<strong>{{ $message }}</strong>
						</span>
					@enderror
					<br/>
					<button type="submit">Simpan</button>
				</form>
			</div>
		</div>
	{{-- Batas Akhir Form Tabel Penulis --}}

	{{-- Form Tabel Tipe Koleksi --}}
		<div class="column">
			<div class="card"> 
                <h4>Tipe Koleksi</h4>
                <form action="{{ route('tipekoleksi.tambah') }}" method="POST">
                	@csrf
                	<label for="tipekoleksi_nama">Tipe Koleksi:</label>
                	<input type="text" name="tipekoleksi_nama" class="@error('tipekoleksi_nama') is-invalid @enderror" value="{{ old('tipekoleksi_nama') }}"> <br/>
                	@error('tipekoleksi_nama')
                		<strong>{{ $message }}</strong>
                	@enderror
                	<br/>
                	<button type="submit">Simpan</button>
                </form>
			</div>
		</div>
	{{-- Batas Akhir Form Tabel Tipe Koleksi --}}

	{{-- Form Tabel Klasifikasi --}}
		<div class="column">
			<div class="card">
				<h4>Klasifikasi</h4>
				<form action="{{ route('klasifikasi.tambah') }}" method="POST">
					@csrf
					<label for="klasifikasi_nama">Klasifikasi:</label>
					<input type="text" name="klasifikasi_nama" class="@error('klasifikasi_nama') is-invalid @enderror" value="{{ old('klasifikasi_nama') }}"> <br/>
					@error('klasifikasi_nama')
						<span class="invalid-feedback" role="alert">
							<strong>{{ $message }}</strong>
						</span>
					@enderror
					<br/>
					<button type="submit">Simpan</button>
				</form>
			</div>
		</div>
	{{-- Batas Akhir Form Tabel Klasifikasi --}}

	{{-- Form Tabel Status Item --}}
		<div class="column">
			<div class="card">
				<h4>Status Item</h4>
				<form action="{{ route('statusitem.tambah') }}" method="POST">
					@csrf
					<label for="status_item_nama">Status Item :</label>
					<input type="text" name="status_item_nama" class="@error('status_item_nama') is-invalid @enderror"> <br/>
					@error('status_item_nama')
						<span class="invalid-feedback" role="alert">
							<strong>{{ $message }}</strong>
						</span>
					@enderror
					<br/>
					<button type="submit">Simpan</button>
				</form>			
			</div>			
		</div>
	{{-- Batas Akhir Form Tabel Status Item --}}

	{{-- Form Tabel Sumber Item --}}
		<div class="column">
			<div class="card">
				<h4>Sumber Item</h4>
				<form action="{{ route('sumberitem.tambah') }}" method="POST">
					@csrf
					<label for="sumber_item_nama">Sumber Item:</label>
					<input type="text" name="sumber_item_nama" class="@error('sumber_item_nama') is-invalid @enderror"> <br/>
					@error('sumber_item_nama')
						<span class="invalid-feedback" role="alert">
							<strong>{{ $message }}</strong>
						</span>
					@enderror
					<br/>
					<button type="sumbit">Simpan</button>
				</form>
			</div>
		</div>
	{{-- Batas Akhir Form Tabel Sumber Item --}}

	{{-- Form Tabel Anggota Tipe --}}
		<div class="column">
			<div class="card">
                <h4>Anggota Tipe</h4>
                <form action="{{ route('anggotatipe.tambah') }}" method="POST">
                	@csrf
                	<label for="anggota_tipe_nama">Tipe Anggota :</label>
                	<input type="text" name="anggota_tipe_nama" class="@error('anggota_tipe_nama') is-invalid @enderror"> <br/>
                	@error('anggota_tipe_nama')
                		<span class="invalid-feedback" role="alert">
                			<strong>{{ $message }}</strong>
                		</span>
                	@enderror
                	<br/>
                	<button type="submit">Simpan</button>
                </form>
			</div>
		</div>
	{{-- Batas Akhir Form Tabel Anggota Tipe --}}
</body>
</html>