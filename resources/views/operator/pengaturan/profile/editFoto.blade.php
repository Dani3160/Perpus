<!DOCTYPE html>
<html>
<head>
	<title>Foto-Edit</title>
</head>
<body>

	<h1 align="center">Edit Foto Profile</h1>
	<br /><br />

	<center>
		<form method="post" action="{{ route('anggota.foto.update', $anggota->anggota_id) }}" enctype="multipart/form-data">
			@csrf
			
			<input type="file" name="foto">
			<button type="submit">Upload</button>
		</form>
	</center>

</body>
</html>