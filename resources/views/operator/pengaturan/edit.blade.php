<!DOCTYPE html>
<html>
<head>
	<title>Edit Profile</title>
</head>
<body>
	<h1>Halaman Edit Sitem</h1>
	<br /><br />
	<form method="post" action="{{ route('operator.sistem.update', $pengaturan->pengaturan_id) }}">
	@csrf

		<table cellpadding="5" cellspacing="0">
			<thead></thead>

			<tbody>
				<tr>
					<td><label for="tentang_kami">Tentang Kami</label></td>
					<td><input type="text" name="tentang_kami" id="tentang_kami" value="{{ $pengaturan->tentang_kami }}"></td>
				</tr>

				<tr>
					<td><label for="tempat">Tempat</label></td>
					<td><input type="text" name="tempat" id="tempat" value="{{ $pengaturan->tempat }}"></td>
				</tr>

				<tr>
					<td><label for="hak_cipta">Hak Cipta</label></td>
					<td><input type="text" name="hak_cipta" id="hak_cipta" value="{{ $pengaturan->hak_cipta }}"></td>
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