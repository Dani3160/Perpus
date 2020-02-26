@extends('layouts.user.master')

@section('judul')
Novel
@stop


@section('navKonten')
    <h4 class="mb-0"><a href="{{route('user.lihat.karya')}}" class="text-white"><i class="fas fa-angle-left"></i></a> </h4> 
@stop
 
@section('konten')

<h5 class="mb-4" style="font-weight: bold;">Novel</h5>

@if($count > 0)

@foreach($novel as $n)
<div class="card mb-3">
    <img src="{{asset('/user/image/default.jpg')}}" style="width: 100%; height: 240px;" alt="" class="img-responsive">
    <div class="card-body">
        
        
        <h4 style="font-weight: bold;">{{$n->novel_judul}}</h4>
        
        <p class="mb-0" style="font-size: 15px;">Karya : {{$n->novel_karya}}</p>
        <p style="font-size: 15px;">Postingan : {{$n->name}}</p>
        <a href="{{route('user.baca.novel', $n->novel_id)}}" class="btn btn-info float-right btn-sm"><i class="fas fa-search"></i> Baca Sekarang</a>    
    </div>
</div>
@endforeach

@else 

<h5 class="mt-3">Tidak ada novel</h5>

@endif 

@stop