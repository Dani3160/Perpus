<div class="row">
	<div class="col-md-3">
		<a href="{{ route('operator.pendukung.biblio.sumberitem.edit', $sumber_item_id) }}" class="btn btn-success btn-sm">
			<i class="fa fa-pencil"></i>
		</a> 
	</div>
	||
	<div class="col-md-1">
		<form action="" method="POST">
		@csrf
		<input type="hidden" name="_method" value="DELETE">
		<button type="submit" class="btn btn-danger btn-sm">
			<i class="fa fa-trash"></i>
		</button>
	</form>
	</div>	
</div>
