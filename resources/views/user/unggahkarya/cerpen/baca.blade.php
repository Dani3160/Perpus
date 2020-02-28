@extends('layouts.user.master')

@section('judul')
Baca Cerpen
@stop

@section('navKonten')
    <h4 class="mb-0"><a href="{{route('user.lihat.cerpen')}}" class="text-white"><i class="fas fa-angle-left"></i></a> </h4> 
@stop

 
@section('konten')

    <h4 class="text-dark mt-3 mb-0" style="font-weight: bold;">{{$cerpen->cerpen_judul}}</h4>

    <p style="font-size: 15px;">Karya : {{$cerpen->cerpen_karya}}</p>
    
    <img src="/user/image/cerpen/{{$cerpen->cerpen_gambar}}" class="img-fluid" alt="">

    <p class="mt-4">{{$cerpen->cerpen_isi}}</p>    
    
@stop