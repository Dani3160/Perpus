<!DOCTYPE html>
<html>
<head>
	<title>Edit Profile</title>
</head>
<body>
	<h1>Halaman Edit Profile</h1>
	<br /><br />
	<form method="post" action="{{ route('anggota.profile.update', $anggota->anggota_id) }}">
	@csrf


	<table cellpadding="5" cellspacing="0">
		<thead></thead>

		<tbody>
			<tr>
				<td><label for="nama">Nama</label></td>
				<td><input type="text" name="anggota_nama" id="nama" value="{{ $anggota->anggota_nama }}"></td>
			</tr>

			<tr>
				<td><label for="tgl">Tanggal Lahir</label></td>
				<td><input type="date" name="tanggal_lahir" id="tgl" value="{{ $anggota->tanggal_lahir }}"></td>
			</tr>

			<tr>
				<td><label for="alamat">Alamat</label></td>
				<td><input type="text" name="alamat" id="alamat" value="{{ $anggota->alamat }}"></td>
			</tr>

			<tr>
				<td><label for="kodePos">Kode Pos</label></td>
				<td><input type="text" name="kode_pos" id="kodePos" value="{{ $anggota->kode_pos }}"></td>
			</tr>

			<tr>
				<td><label for="telepon">Telepon</label></td>
				<td><input type="text" name="telepon" id="telepon" value="{{ $anggota->telepon }}"></td>
			</tr>

			<tr>
				<td><label for="whatsapp">Whatsapp</label></td>
				<td><input type="text" name="whatsapp" id="whatsapp" value="{{ $anggota->whatsapp }}"></td>
			</tr>

			<tr>
				<td><label for="facebook">Facebook</label></td>
				<td><input type="text" name="facebook" id="faceebook" value="{{ $anggota->facebook }}"></td>
			</tr>

			<tr>
				<td><label for="instagram">Instagram</label></td>
				<td><input type="text" name="instagram" id="instagram" value="{{ $anggota->instagram }}"></td>
			</tr>

			<tr>
				<td><label for="posel">Posel</label></td>
				<td><input type="text" name="posel" id="posel" value="{{ $anggota->posel }}"></td>
			</tr>

			<tr>
				<td>
					<button type="submit">Kirim</button>
				</td>
			</tr>

			
		</tbody>
	</table>

	</form>
</body>
</html>