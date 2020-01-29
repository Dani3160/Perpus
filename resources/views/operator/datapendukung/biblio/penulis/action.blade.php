<div class="row">
	<div class="col-md-3">
		<a href="{{ route('operator.pendukung.biblio.penulis.edit', $penulis_id) }}" class="btn btn-success btn-sm">
			<i class="fas fa-edit"></i>
		</a> 
	</div>
	<div class="col-md-1">
		<form action="{{ route('operator.pendukung.penulis.hapus', $penulis_id) }}" method="POST">
		@csrf
		<input type="hidden" name="penulis_id" value="{{ $penulis_id }}">
		<button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin hapus data ini?');">
			<i class="fas fa-trash"></i>
		</button>
	</form>
	</div>	
</div>
