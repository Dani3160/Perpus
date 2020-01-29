<div class="row">
	<div class="col-md-3">
		<a href="{{ route('operator.pendukung.biblio.statusitem.edit', $status_item_id) }}" class="btn btn-success btn-sm">
			<i class="fas fa-edit"></i>
		</a> 
	</div>
	<div class="col-md-1">
		<form action="{{ route('operator.pendukung.statusitem.hapus', $status_item_id) }}" method="POST">
		@csrf
		<input type="hidden" name="status_item_id" value="{{ $status_item_id }}">
		<button type="submit" class="btn btn-danger btn-sm">
			<i class="fas fa-trash"></i>
		</button>
	</form>
	</div>	
</div>
