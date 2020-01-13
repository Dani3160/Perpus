<form action="#">
	@csrf

	<a href="{{ route('operator.ubah.anggota.tipe', $anggota_tipe_id) }}" class="btn btn-sm btn-success">Ubah</a> ||
	<span onclick="return confirm('Anda Yakin ?')"><button class="btn btn-sm btn-danger">Hapus</button></span>
	<input type="hidden" name="_method" value="DELETE">
</form>