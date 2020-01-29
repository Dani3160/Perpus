<div class="row">
    <form action="{{ route('operator.novel.konfirmasi', $novel_id) }}" method="POST">
    @csrf
        <input type="hidden" name="novel_id" value="{{$novel_id}}">
        <button class="btn btn-primary btn-sm ml-2"><i class="fas fa-check"></i></button>
    </form>
    <form action="{{route('operator.novel.hapus', $novel_id)}}" method="post">
    @csrf
        <input type="hidden" name="_method" value="DELETE">
        <a href="{{route('operator.novel.edit', $novel_id)}}" class="btn btn-success btn-sm ml-1"><i class="fas fa-edit"></i></a>
        <button class="btn btn-danger btn-sm" onclick="return confirm('Yakin Hapus Data?');"><i class="fas fa-trash"></i></button>
    </form>
</div>
