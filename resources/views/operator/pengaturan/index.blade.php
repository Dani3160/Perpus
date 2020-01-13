<!DOCTYPE html>
<html>
<head>
	<title>Pengaturan Sistem</title>
</head>
<body>

	<h1>Tentang Kami <span style="color: red">{{ $pengaturan->tentang_kami }}</span></h1>
	<h2>Tempat <span style="color: red">{{ $pengaturan->tempat }}</span></h2>
	<h3>Hak Cipta <span style="color: red">{{ $pengaturan->hak_cipta }}</span></h3>

	<a href="{{ route('operator.sistem.ubah', $pengaturan->pengaturan_id) }}">Ubah Data Sitem</a>



	

</body>
</html>