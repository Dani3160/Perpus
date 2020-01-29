<div class="row">
	<div class="col-md-3">
		<a href="{{ route('operator.pendukung.biblio.klasifikasi.edit', $klasifikasi_id) }}" class="btn btn-success btn-sm">
			<i class="fas fa-edit"></i>
		</a> 
	</div>
	<div class="col-md-1">
		<form action="{{ route('operator.pendukung.klasifikasi.hapus', $klasifikasi_id) }}" method="POST">
		@csrf
		<input type="hidden" name="klasifikasi_id" value="{{ $klasifikasi_id }}">
		<button type="submit" class="btn btn-danger btn-sm">
			<i class="fas fa-trash"></i>
		</button>
	</form>
	</div>	
</div>
