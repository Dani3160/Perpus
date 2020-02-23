@extends('layouts.user.master')

@section('judul')
Kategori Karya
@stop

@section('navKonten')
    <h4 class="mb-0"><a href="{{route('user.dashboard')}}" class="text-white"><i class="fas fa-angle-left"></i></a> </h4> 
@stop
 
@section('konten')

    <h5 class="text-dark" style="font-family: arial; font-weight:bold;">Membaca Karya</h5>

    <img src="{{asset('user/image/karya.png')}}" class="img-fluid" style="width: 100%;" alt="">

    <p>
        Pilih Untuk Membaca
    </p>

    
    <div class="row">
        <div class="col-10">
            <h6>
                <a style="color: #000;font-weight: bold;" href="{{route('user.lihat.cerpen')}}">Cerpen</a>
            </h6>
        </div>
        <div class="col-2">
        <a style="color: #000;font-weight: bold;" href="{{route('user.lihat.cerpen')}}"><i class="fas fa-arrow-right"></i></a>
        </div>
    </div>

    <hr style="border-color: #000; margin-top: 2px;">

    <div class="row">
        <div class="col-10">
            <h6>
                <a style="color: #000;font-weight: bold;" href="{{route('user.lihat.novel')}}">Novel</a>
            </h6>
        </div>
        <div class="col-2">
            <a style="color: #000;font-weight: bold;" href="{{route('user.lihat.novel')}}"><i class="fas fa-arrow-right"></i></a>
        </div>
    </div>
        
    <hr style="border-color: #000; margin-top: 2px;">

    <div class="row">
        <div class="col-10">
            <h6>
                <a style="color: #000;font-weight: bold;" href="{{route('user.lihat.puisi')}}">Puisi</a>
            </h6>
        </div>
        <div class="col-2">
            <a style="color: #000;font-weight: bold;" href="{{route('user.lihat.puisi')}}"><i class="fas fa-arrow-right"></i></a>
        </div>
    </div>

    <hr style="border-color: #000; margin-top: 2px;">


@stop