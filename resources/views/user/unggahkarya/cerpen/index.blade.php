@extends('layouts.user.master')

@section('judul')
Cerpen
@stop
 
@section('navKonten')
    <h4 class="mb-0"><a href="{{route('user.lihat.karya')}}" class="text-white"><i class="fas fa-angle-left"></i></a> </h4> 
@stop

@section('konten')

<h5 class="mb-4" style="font-weight: bold;">Cerpen ( Cerita Pendek )</h5>

@foreach($cerpen as $n)
<div class="card mb-3">
    <img src="{{asset('/user/image/default.jpg')}}" style="width: 100%; height: 240px;" alt="" class="img-responsive">
    <div class="card-body">
        
        
        <h4 style="font-weight: bold;">{{$n->cerpen_judul}}</h4>
        
        <p class="mb-0" style="font-size: 15px;">Karya : {{$n->cerpen_karya}}</p>
        <p style="font-size: 15px;">Postingan : {{$n->name}}</p>
        <a href="{{route('user.baca.cerpen', $n->cerpen_id)}}" class="btn btn-info float-right btn-sm"><i class="fas fa-search"></i> Baca Sekarang</a>    
    </div>
</div>
@endforeach

@stop