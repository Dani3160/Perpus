@extends('layouts.user.master')

@section('judul')
Baca Puisi
@stop

@section('navKonten')
    <h4 class="mb-0"><a href="{{route('user.lihat.puisi')}}" class="text-white"><i class="fas fa-angle-left"></i></a> </h4> 
@stop

 
@section('konten')

    <h4 class="text-dark mt-3 mb-0" style="font-weight: bold;">{{$puisi->puisi_judul}}</h4>

    <p style="font-size: 15px;">Karya : {{$puisi->puisi_karya}}</p>
    
    <img src="{{asset('user/image/default.jpg')}}" class="img-responsive" alt="">

    <p class="mt-4">{{$puisi->bait1}}</p>    
    <p class="mt-4">{{$puisi->bait2}}</p>    
    <p class="mt-4">{{$puisi->bait3}}</p>    
    <p class="mt-4">{{$puisi->bait4}}</p>    
    
@stop