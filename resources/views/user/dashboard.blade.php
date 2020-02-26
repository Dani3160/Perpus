@extends('layouts.user.master')

@section('judul')
Dashboard
@stop

@section('navKonten')
<img src="/image/logo/log.png" style="width: 40px;" alt="" class="img-responsive">
@stop 
 
@section('konten')

<div class="container">
    <h6 style="font-weight:bold; color:#000;">Selamat Datang, {{ Auth::user()->name }}</h6>
</div>
<div class="container-fluid mb-3">
    
        <div class="row mt-4">
            <div class="col-6">
                <div class="card" style="border-color: #309fe6;">
                    <a href="{{route('user.klasifikasi.buku')}}">
                        <div class="card-body">
                            <img src="{{asset('user/image/buku.png')}}" class="img-fluid" style="width: 100%;" alt="">
                            <p class="text-center mb-0" style="font-size: 14px; font-weight: bold;">Buku</p>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-6">
                <div class="card" style="border-color:#309fe6;">
                    <a href="{{route('user.literasi')}}">
                        <div class="card-body">
                            <img src="{{asset('user/image/resume.png')}}" class="img-fluid" style="width: 100%;" alt="">
                            <p class="text-center mb-0" style="font-size: 14px; font-weight: bold;">Resume</p>   
                        </div>
                    </a>
                </div>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-6">
                <div class="card" style="border-color: #309fe6;">
                    <a href="{{route('user.profile')}}">
                        <div class="card-body">
                            <img src="{{asset('user/image/profile.png')}}" class="img-fluid" style="width: 100%;" alt="">
                            <p class="text-center mb-0" style="font-size: 14px; font-weight: bold;">Profile</p>   
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-6">
                <div class="card" style="border-color: #309fe6;">
                    <a href="{{route('user.unggah')}}">
                        <div class="card-body">
                            <img src="{{asset('user/image/unggah.png')}}" class="img-fluid" style="width: 100%;" alt="">
                            <p class="text-center mt-3 mb-0" style="font-size: 14px; font-weight: bold;">Unggah</p>
                        </div>
                    </a>
                </div>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-6">
                <div class="card" style="border-color: #309fe6;">
                    <a href="{{route('user.lihat.karya')}}">
                        <div class="card-body">
                            <img src="{{asset('user/image/karya.png')}}" class="img-fluid" style="width: 100%;" alt="">
                            <p class="text-center mb-0" style="font-size: 14px; font-weight: bold;">Baca</p>
                        </div>
                    </a>
                </div>
            </div>
            
            <div class="col-6">
                <div class="card" style="border-color: #309fe6;">
                    <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <div class="card-body">
                            <img src="{{asset('user/image/logout.png')}}" class="img-fluid" style="width: 100%;" alt="">
                            <p class="text-center mb-0" style="font-size: 14px; font-weight: bold;">Logout</p>   
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">@csrf</form>
                        </div>
                    </a>
                </div>
                
            </div>
        </div>
</div>


@stop 