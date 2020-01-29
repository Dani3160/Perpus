<div class="row">
	<div class="col-md-3">
		<a href="{{route('operator.pendukung.biblio.statussirkulasi.edit', $status_sirkulasi_id)}}" class="btn btn-success btn-sm">
			<i class="fas fa-edit"></i>
		</a> 
	</div>
	<div class="col-md-1">
		<form action="{{ route('operator.pendukung.statussirkulasi.hapus', $status_sirkulasi_id) }}" method="POST">
		@csrf
		<input type="hidden" name="status_sirkulasi_id" value="{{ $status_sirkulasi_id }}">
		<button type="submit" class="btn btn-danger btn-sm">
			<i class="fas fa-trash"></i>
		</button>
	</form>
	</div>	
</div>
