@extends('layouts.user.master')

@section('judul')
Detail Resume
@stop

@section('navKonten')
    <h4 class="mb-0"><a href="{{route('user.literasi')}}" class="text-white"><i class="fas fa-angle-left"></i></a> </h4> 
@stop

@section('konten')

<div class="container">
    <h4 class="mb-0">{{$resume->resume_judul}}</h4>
    <p style="font-size: 12px;">{{$resume->hari}}, <?php echo date('d-m-Y', strtotime($resume->tanggal_resume)); ?></p>
    <p class="mt-3">{{$resume->resume_isi}}</p>
</div>

@stop 