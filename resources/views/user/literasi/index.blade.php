@extends('layouts.user.master')

@section('judul')
Literasi
@stop

@section('navKonten')
    <h4 class="mb-0"><a href="{{route('user.dashboard')}}" class="text-white"><i class="fas fa-angle-left"></i></a> </h4> 
@stop

@section('konten')

<div class="row mt-4 mb-4">
    <div class="col-8">
        <h6 class="text-dark" style="font-weight:bold;">
            Resume Literasi
        </h6>
    </div>
    <div class="col-4">
        <a href="{{route('user.formliterasi')}}">
            <button class="btn btn-sm text-white ml-2" style="background: #5caeea; font-size: 10px; margin-top: -5px;"><i class="fas fa-plus-circle" style="color: #fff;"></i> Tambah</button> 
        </a>
    </div>
</div>

@if($count > 0)

@foreach($resume as $r)
<div class="card mb-4">
    <div class="card-body">
        <div class="row">
            <div class="col-4">
                <p class="mb-0" style="font-size: 10px;font-weight:bold;"><?php echo date('d-m-Y', strtotime($r->tanggal_resume)); ?></p>
            </div>
            <div class="col-5">
                <p class="mb-0">{{$r->resume_judul}}</p>    
            </div>
            <div class="col-3"><a href="{{route('user.detail.literasi', $r->resume_id)}}" style="font-size: 12px;"><i class="fas fa-search"></i> lihat</a></div>
        </div>
    </div>
</div>
@endforeach
{{$resume->links()}}

@else
<h5 class="mt-3">Tidak ada resume literasi</h5>
@endif

@stop 