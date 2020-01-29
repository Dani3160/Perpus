<form action="{{route('operator.anggota.delete', $anggota_id)}}" method="post">
@csrf
<a href="{{ route('operator.anggota.ubah', $anggota_id) }}" class="btn btn-sm btn-success"><i class="fas fa-edit"></i></a>
<button class="btn btn-sm btn-danger" onclick="return confirm('Yakin hapus data ini?');"><i class="fas fa-trash"></i></button>
<input type="hidden" name="_method" value="DELETE">
</form>