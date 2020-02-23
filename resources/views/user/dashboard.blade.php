@extends('layouts.user.master')

@section('judul')
Dashboard
@stop
 
@section('konten')
<div class="container-fluid">
    <h6 style="font-weight:bold;">Selamat Datang, {{ Auth::user()->name }}</h6>
    
        <div class="row mt-4">
            <div class="col-6">
                <div class="card">
                    <a href="">
                        <div class="card-body">
                            <img src="{{asset('user/image/buku.png')}}" class="img-fluid" style="width: 100%;" alt="">
                            <p class="text-center mb-0" style="font-size: 14px; font-weight: bold;">Buku</p>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-6">
                <div class="card">
                    <a href="{{route('user.literasi')}}">
                        <div class="card-body">
                            <img src="{{asset('user/image/resume.png')}}" class="img-fluid" style="width: 100%;" alt="">
                            <p class="text-center mb-0" style="font-size: 14px; font-weight: bold;">Resume</p>   
                        </div>
                    </a>
                </div>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-6">
                <div class="card">
                    <a href="{{route('user.profile')}}">
                        <div class="card-body">
                            <img src="{{asset('user/image/profile.png')}}" class="img-fluid" style="width: 100%;" alt="">
                            <p class="text-center mb-0" style="font-size: 14px; font-weight: bold;">Profile</p>   
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-6">
                <div class="card">
                    <a href="{{route('user.unggah')}}">
                        <div class="card-body">
                            <img src="{{asset('user/image/unggah.png')}}" class="img-fluid" style="width: 100%;" alt="">
                            <p class="text-center mt-3 mb-0" style="font-size: 14px; font-weight: bold;">Unggah</p>
                        </div>
                    </a>
                </div>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-6">
                <div class="card">
                    <a href="{{route('user.lihat.karya')}}">
                        <div class="card-body">
                            <img src="{{asset('user/image/karya.png')}}" class="img-fluid" style="width: 100%;" alt="">
                            <p class="text-center mb-0" style="font-size: 14px; font-weight: bold;">Baca</p>
                        </div>
                    </a>
                </div>
            </div>
            
            <div class="col-6">
                <div class="card">
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