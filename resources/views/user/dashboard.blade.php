@extends('layouts.user.master')

@section('judul')
Dashboard
@stop
 
@section('konten')
<div class="container-fluid">
    <h5>Selamat Datang, {{ Auth::user()->name }}</h5>
    
        <div class="row mt-4">
            <div class="col-6">
                <div class="card">
                    <div class="card-body">
                        <img src="{{asset('user/image/buku.png')}}" class="img-fluid" style="width: 100%;" alt="">
                        <p class="text-center mb-0" style="font-weight: bold;">Lihat Buku</p>
                    </div>
                </div>
            </div>
            <div class="col-6">
                <div class="card">
                    <div class="card-body">
                        <img src="{{asset('user/image/profile.png')}}" class="img-fluid" style="width: 100%;" alt="">
                        <p class="text-center mb-0" style="font-weight: bold;">Profile</p>   
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-6">
                <div class="card">
                    <div class="card-body">
                        <img src="{{asset('user/image/unggah.png')}}" class="img-fluid" style="width: 100%;" alt="">
                        <p class="text-center mt-3 mb-0" style="font-weight: bold;">Unggah Karya</p>
                    </div>
                </div>
            </div>
            <div class="col-6">
                <div class="card">
                    <div class="card-body">
                        <img src="{{asset('user/image/resume.png')}}" class="img-fluid" style="width: 100%;" alt="">
                        <p class="text-center mb-0" style="font-weight: bold;">Resume Literasi</p>   
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-6">
                <div class="card">
                    <div class="card-body">
                        <img src="{{asset('user/image/karya.png')}}" class="img-fluid" style="width: 100%;" alt="">
                        <p class="text-center mb-0" style="font-weight: bold;">Baca Karya</p>
                    </div>
                </div>
            </div>
            
            <div class="col-6">
                <div class="card">
                    <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <div class="card-body">
                            <img src="{{asset('user/image/logout.png')}}" class="img-fluid" style="width: 100%;" alt="">
                            <p class="text-center mb-0" style="font-weight: bold;">Logout</p>   
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">@csrf</form>
                        </div>
                    </a>
                </div>
                
            </div>
            

        </div>
</div>


@stop 