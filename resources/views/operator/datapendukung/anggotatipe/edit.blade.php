<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Ubah Data Anggota Tipe</title>
	<link rel="stylesheet" href="{{ asset('css/datamaster.css') }}">
</head>
<body>
	{{-- Form Tabel Anggota Tipe --}}
		<div class="column">
			<div class="card">
                <h4>Anggota Tipe</h4>
                <form action="{{ route('anggotatipe.tambah') }}" method="POST">
                	@csrf
                	<input type="hidden" name="anggota_tipe_id" value="{{ $anggotatipe->anggota_tipe_id }}">
                	<label for="anggota_tipe_nama">Tipe Anggota :</label>
                	<input type="text" name="anggota_tipe_nama" class="@error('anggota_tipe_nama') is-invalid @enderror" value="{{ $anggotatipe->anggota_tipe_nama }}"> <br/>
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