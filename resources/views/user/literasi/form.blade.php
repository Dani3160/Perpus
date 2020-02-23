@extends('layouts.user.master')

@section('judul')
Form Literasi
@stop

@section('navKonten')
    <h4 class="mb-0"><a href="{{route('user.literasi')}}" class="text-white"><i class="fas fa-angle-left"></i></a> </h4> 
@stop
 
@section('konten')


<h5 class="text-dark mb-4" style="font-weight:bold;">Form Resume Literasi</h5>

<form action="{{route('user.post.literasi')}}" method="post">
    @csrf
    <input type="hidden" name="anggota_id" value="{{Auth::user()->id}}">
    <input type="hidden" name="kelas_id" value="{{Auth::user()->kelas_id}}">
    <div class="form-group">
        <label>Hari</label>
        <select name="hari" class="form-control">
            <option value="">Pilih Hari</option>
            <option value="Senin">Senin</option>
            <option value="Selasa">Selasa</option>
            <option value="Rabu">Rabu</option>
            <option value="Kamis">Kamis</option>
            <option value="Jum'at">Jum'at</option>
            <option value="Sabtu">Sabtu</option>
            <option value="Minggu">Minggu</option>
        </select>
    </div>
    <div class="form-group">
        <label>Tanggal Resume</label>
        <input type="date" name="tanggal_resume" class="form-control">
    </div>
    <div class="form-group">
        <label>Judul</label>
        <input type="text" name="resume_judul" class="form-control" placeholder="Judul Resume">
    </div>
    <div class="form-group">
        <textarea name="resume_isi" class="form-control" cols="30" rows="7" placeholder="Isi Resume"></textarea>
    </div>    
    <button class="btn btn-info float-right" style="background: #5caeea;">Simpan</button>
</form>

@stop