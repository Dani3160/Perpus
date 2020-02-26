@extends('layouts.user.master')

@section('judul')
Buku
@stop

@section('navKonten')
<h4 class="mb-0"><a href="{{route('user.dashboard')}}" class="text-white"><i class="fas fa-angle-left"></i></a> </h4> 
@stop
 
@section('konten')
<h5 class="text-dark mb-4" style="font-weight:bold;"><img src="{{asset('user/image/search.png')}}" style="width: 8%;" alt=""> Cari Buku</h5>

<div class="card shadow mb-3">
    <div class="card-body">
        <form action="{{route('user.buku')}}" method="get" accept="charset-utf8">
            <div class="row">
                <div class="col-12">
                @foreach($klasifikasi as $k => $key)
                    <input type="radio" id="{{$key->klasifikasi_id}}" name="klasifikasi_id"  class="input-hidden mb-0" value="{{$key->klasifikasi_id}}" /> <label for="{{$key->klasifikasi_id}}" class="mb-0" style="color: #000;">{{$key->klasifikasi_nama}}</label>
                    <hr class="mt-2" style="border-color:#3793e4;">
                @endforeach
                    <button type="submit" class="btn btn-info mb-0" style="width: 100%; font-weight:bold;"><i class="fas fa-search"></i> Cari</button>
                </div>
            </div>
        </form>
    </div>
</div>



@stop 

