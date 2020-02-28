@extends('layouts.user.master')

@section('judul')
Baca Puisi
@stop

@section('navKonten')
    <h4 class="mb-0"><a href="{{route('user.lihat.puisi')}}" class="text-white"><i class="fas fa-angle-left"></i></a> </h4> 
@stop

 
@section('konten')

    <h4 class="text-dark mt-3 mb-0" style="font-weight: bold;color:#000;">{{$puisi->puisi_judul}}</h4>

    <p style="font-size: 15px;color:#000;">Karya : {{$puisi->puisi_karya}}</p>
    
    <img src="/user/image/puisi/{{$puisi->puisi_gambar}}" class="img-fluid" style="height:250px;" alt="">

    <div class="container">
        <p class="mt-4">{{$puisi->bait1}}</p>    
        <p class="mt-4">{{$puisi->bait2}}</p>    
        <p class="mt-4">{{$puisi->bait3}}</p>    
        <p class="mt-4">{{$puisi->bait4}}</p>    
    </div>
@stop