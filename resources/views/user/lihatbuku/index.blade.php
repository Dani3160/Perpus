@extends('layouts.user.master')

@section('judul')
Buku
@stop

@section('navKonten')
<h4 class="mb-0"><a href="{{route('user.dashboard')}}" class="text-white"><i class="fas fa-angle-left"></i></a> </h4> 
@stop
 
@section('konten')
<h5 class="text-dark mb-4" style="font-weight:bold;"><img src="{{asset('user/image/buku.png')}}" style="width: 15%;" alt="">Kategori Buku</h5>


<div class="card mb-3">
    <div class="card-body">
        <form action="{{route('user.buku')}}" method="get" accept="charset-utf8">
            <div class="row">

                <div class="col-12">
                @foreach($klasifikasi as $k => $key)
                    <p class="mb-0" style="font-size: 14px;font-weight:bold;"><input type="radio" id="{{$key->klasifikasi_id}}" name="klasifilasi_id"  class="input-hidden" value="{{$key->klasifikasi_id}}" /> <label for="{{$key->klasifikasi_id}}">{{$key->klasifikasi_nama}}</label> </p>  
                @endforeach
                    <button type="submit" class="btn btn-link mb-0"><i class="fas fa-angle-right"></i></button>
                </div>
            </div>
        </form>
    </div>
</div>


@stop 

