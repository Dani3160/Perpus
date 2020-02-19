<form action="{{route('user.post.literasi')}}" method="post">
    @csrf
    <select name="hari" class="form-control" id="">
        <option value="">Pilih Hari</option>
        <option value="Senin">Senin</option>
        <option value="Selasa">Selasa</option>
        <option value="Rabu">Rabu</option>
        <option value="Kamis">Kamis</option>
        <option value="Jum'at">Jum'at</option>
        <option value="Sabtu">Sabtu</option>
        <option value="Minggu">Minggu</option>
    </select>
    <input type="date" name="tanggal_resume" class="form-control">
    <input type="text" name="resume_judul" class="form-control" placeholder="Judul Resume">
    <textarea name="resume_isi" id="" cols="30" rows="7" placeholder="Isi Resume"></textarea>
    <button class="btn btn-primary">Simpan</button>
</form>