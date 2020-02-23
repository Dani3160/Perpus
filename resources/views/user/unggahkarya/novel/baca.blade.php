@extends('layouts.user.master')

@section('judul')
Baca Novel
@stop

@section('navKonten')
    <h4 class="mb-0"><a href="{{route('user.lihat.novel')}}" class="text-white"><i class="fas fa-angle-left"></i></a> </h4> 
@stop

 
@section('konten')

    <h4 class="text-dark mt-3 mb-0" style="font-weight: bold;">{{$novel->novel_judul}}</h4>

    <p style="font-size: 15px;">Karya : {{$novel->novel_karya}}</p>
    
    <img src="{{asset('user/image/default.jpg')}}" class="img-responsive" alt="">

    <p class="mt-4">{{$novel->novel_isi}}</p>    
    
@stop