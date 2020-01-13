<form action="{{ route('operator.biblio.hapus', $biblio_id) }}" method="POST">
	@csrf
	<a href="{{ route('operator.biblio.edit', $biblio_id) }}" class="btn btn-success btn-sm"><i class="fas fa-pen"></i></a>
	<a href="{{ route('operator.biblio.detail', $biblio_id) }}" class="btn btn-warning btn-sm"><i class="fas fa-search"></i></a>
	<input type="hidden" name="biblio_id" value="{{ $biblio_id }}">
	<button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin Hapus Data Ini?')"><i class="fas fa-trash"></i></button>
</form>