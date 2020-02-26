@extends('layouts.user.master')

@section('judul')
Buku
@stop

@section('navKonten')
<h4 class="mb-0"><a href="{{route('user.klasifikasi.buku')}}" class="text-white"><i class="fas fa-angle-left"></i></a> </h4> 
@stop
 
@section('konten')

<h5 style="font-weight:bold;"><img src="{{asset('user/image/buku/default.png')}}" style="width: 10%;" alt="" class="img-fluid"> Detail Buku</h5>

<div class="text-center">
    <img src="/user/image/buku/{{$biblio->gambar}}" alt="" class="img-fluid">
</div>

<div class="table-responsive">
    <table class="table table-striped mt-4 mb-3">
        <tr>
            <td>Nama Buku :</td>
            <td>{{$biblio->judul}}</td>
        </tr>
        <tr>
            <td>Edisi :</td>
            <td>{{$biblio->edisi}}</td>
        </tr>
        <tr>
            <td>ISBN :</td>
            <td>{{$biblio->isbn}}</td>
        </tr>
        <tr>
            <td>Penerbit :</td>
            <td>{{$biblio->penerbit_nama}}</td>
        </tr>
        <tr>
            <td>Tahun Terbit :</td>
            <td>{{$biblio->penerbit_tahun}}</td>
        </tr>
        <tr>
            <td>Tempat Terbit :</td>
            <td>{{$biblio->penerbit_tempat}}</td>
        </tr>
        <tr>
            <td>Penulis :</td>
            <td>{{$biblio->penulis_nama}}</td>
        </tr>
        <tr>
            <td>Klasifikasi :</td>
            <td>{{$biblio->klasifikasi_nama}}</td>
        </tr>
    </table>
</div>

@stop 