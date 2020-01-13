<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Data Tipe Anggota</title>
	<link rel="stylesheet" href="{{ asset('css/datamaster.css') }}">
</head>
<body>
	{{-- Pemberitahuan Status Simpan data --}}
		@if($message = Session::get('pesan'))
			<div class="alert">
				<span class="closebtn" onclick="this.parentElement.style.display='none';">x</span>
				<strong>{{ $message }}</strong>
			</div>
		@endif
		@if($errors->any())
			<div class="alert">
				<span class="closebtn" onclick="this.parentElement.style.display='none';">x</span>
				<strong>Maaf Anda Belum Mengisikan Data!</strong>
			</div>
		@endif
	{{-- Batas Akhir Pemberitahuan Status Simpan Data --}}

	{{-- Tabel Anggota Tipe --}}
		<table class="tabel">
			<thead>
				<tr>
					<th>No</th>
					<th>Tipe Anggota</th>
					<th>Pembuatan</th>
					<th>Perubahan</th>
					<th>Opsi</th>
				</tr>
			</thead>
			<?php $no=1; ?>
			@foreach($anggotatipe as $at)
			<tbody>
				<tr>
					<td>{{ $no++ }}</td>
					<td>{{ $at->anggota_tipe_nama }}</td>
					<td>{{ date('d F Y', strtotime($at->pembuatan)) }}</td>
					<td>{{ date('d F Y', strtotime($at->perubahan)) }}</td>
					<td>	
						<a href="{{ route('anggotatipe.edit', $at->anggota_tipe_id) }}"><button>Ubah</button></a> ||
						<form action="{{ route('anggotatipe.hapus', $at->anggota_tipe_id) }}" method="POST">
							@csrf
							<span onclick="return confirm('Hapus data ini?')"><button type="submit">Hapus</button></span>
							<input type="hidden" name="_method" value="DELETE">
						</form>
					</td>
				</tr>
			</tbody>
			@endforeach
		</table>
	{{-- Batas Akhir Tabel Anggota Tipe --}}
</body>
</html>