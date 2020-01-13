<!DOCTYPE html>
<html>
<head>
	<title>Halaman Profile</title>
</head>
<body>
	<h1>Halaman Profile</h1>

	<img src="{{ asset('/images/profile/'.$anggota->foto) }}" width="200">
	<a href="{{ route('anggota.foto.ubah', $anggota->anggota_id) }}">Ubah Poto-Profile</a>

	<table cellpadding="5" cellspacing="0">
		<thead></thead>

		<tbody>
			<tr>
				<td>Nama : </td>
				<td>{{$anggota->anggota_nama}}</td>
			</tr>

			<tr>
				<td>Tanggal Lahir : </td>
				<td>{{$anggota->tanggal_lahir}}</td>
			</tr>

			<tr>
				<td>Alamat : </td>
				<td>{{$anggota->alamat}}</td>
			</tr>

			<tr>
				<td>KodePos : </td>
				<td>{{$anggota->kode_pos}}</td>
			</tr>

			<tr>
				<td>Telepon : </td>
				<td>{{$anggota->telepon}}</td>
			</tr>

			<tr>
				<td>Whatsapp : </td>
				<td>{{$anggota->whatsapp}}</td>
			</tr>

			<tr>
				<td>FaceBook : </td>
				<td>{{$anggota->facebook}}</td>
			</tr>

			<tr>
				<td>Instagram : </td>
				<td>{{$anggota->instagram}}</td>
			</tr>

			<tr>
				<td>Posel : </td>
				<td>{{$anggota->posel}}</td>
			</tr>
		</tbody>
	</table>
	<br /><br />

	<a href="{{ route('anggota.profile.ubah', $anggota->anggota_id) }}">Ubah Data-Profile</a>
	
				
				
				
				
				
				
				

</body>
</html>