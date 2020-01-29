<form action="#" method="post">
	@csrf
	<a href="{{route('operator.ubah.jurusan', $jurusan_id)}}" class="btn btn-sm btn-success"><i class="fas fa-edit"></i></a> 
	<span onclick="return confirm('Yakin');"><button class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></button></span>
	<input type="hidden" name="_method" value="DELETE">
</form>