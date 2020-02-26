@extends('layouts.user.master')

@section('judul')
Buku
@stop

@section('navKonten')
<h4 class="mb-0"><a href="{{route('user.klasifikasi.buku')}}" class="text-white"><i class="fas fa-angle-left"></i></a> </h4> 
@stop
 
@section('konten')

@if($count > 0)
    
<h5 class="display-4s mb-4">@if($id)Buku {{$klasifikasi->klasifikasi_nama}} @else Semua Buku @endif</h5>

@foreach($buku as $b => $key)
    <div class="card shadow mt-2">
        <img src="/operator/image/{{$key->gambar}}" alt="" class="img-fluid">
        <div class="card-body">
            <p class="mb-2"> <span style="font-weight:bold;">Nama Buku :</span> {{$key->judul}}</p>
            <p class="mb-2"> <span style="font-weight:bold;">Penerbit :</span> {{$key->penerbit_nama}}</p>
            <p> <span style="font-weight:bold;">Penulis :</span> {{$key->penulis_nama}}</p>
            <a href="{{route('user.buku.detail', $key->biblio_id)}}" class="float-right btn btn-info btn-sm"><i class="fas fa-search"></i> Lihat Detail</a>
        </div>
    </div>
@endforeach

@else
<h6 class="mt-3" style="color: #000;">Tidak Ada Buku</h6>
@endif        
    
@stop