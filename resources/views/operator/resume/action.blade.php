
<form action="{{route('operator.resume.hapus', $resume_id)}}" method="post">
    @csrf
    <a href="{{route('operator.resume.edit', $resume_id)}}" class="btn btn-success btn-sm"><i class="fas fa-edit"></i></a>
    <button class="btn btn-danger btn-sm" onclick="return confirm('Yakin Hapus Data?');"><i class="fas fa-trash"></i></button>
    <input type="hidden" name="_method" value="DELETE">
</form>


