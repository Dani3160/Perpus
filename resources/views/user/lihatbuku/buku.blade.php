@extends('layouts.user.master')

@section('judul')
Buku
@stop

@section('navKonten')
<h4 class="mb-0"><a href="{{route('user.klasifikasi.buku')}}" class="text-white"><i class="fas fa-angle-left"></i></a> </h4> 
@stop
 
@section('konten')
    @foreach($buku as $b => $key)
        {{$key->judul}}
    @endforeach
@stop