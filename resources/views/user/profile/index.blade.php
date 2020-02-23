@extends('layouts.user.master')

@section('judul')
Profile
@stop

@section('navKonten')
    <h4 class="mb-0"><a href="{{route('user.dashboard')}}" class="text-white"><i class="fas fa-angle-left"></i></a> </h4> 
@stop
 
@section('konten')


<h5 class="text-dark mb-4" style="font-weight:bold;">Profile User</h5>

<form action="{{route('user.profile.post')}}" method="post">
    @csrf
    <input type="hidden" name="id" value="{{Auth::user()->id}}">
    
    <div class="form-group text-center">
        <label>Ubah Foto</label> <br>
        <img src="/user/image/{{$profile->foto}}" alt="" class="img-responsive rounded-circle">
    </div>
    <br>
    <div class="row">
        <div class="col-6 form-group">
            <label>Nama</label>
            <input type="text" name="name" class="form-control" value="{{$profile->name}}" autocomplete="off" placeholder="Masukan Nama...">
        </div>
        <div class="col-6 form-group">
            <label>Email</label>
            <input type="text" name="email" class="form-control" value="{{$profile->email}}" autocomplete="off" placeholder="Masukan Email...">
        </div>
    </div>
    <div class="row">
        <div class="col-6 form-group">
            <label>Jenis Kelamin</label>
            <select name="jenis_kelamin" class="custom-select">
            @if($profile->jenis_kelamin == null)
                <option value="">Pilih</option>
                <option value="L">Laki - Laki</option>
                <option value="P">Perempuan</option>
            @else  
                <option value="{{$profile->jenis_kelamin}}" selected>{{$profile->jenis_kelamin}}</option>
            @endif
            </select>
        </div>
        <div class="col-6 form-group">
            <label>Tanggal Lahir</label>
            <input type="date" name="tanggal_lahir" class="form-control" value="{{$profile->tanggal_lahir}}">
        </div>
    </div>
    <div class="row">
        <div class="col-6 form-group">
            <label>Kode Pos</label>
            <input type="text" name="kode_pos" class="form-control" value="{{$profile->kode_pos}}" autocomplete="off" placeholder="Masukan Kodepos...">
        </div>
        <div class="col-6 form-group">
            <label>Telepon</label>
            <input type="text" name="telepon" class="form-control" value="{{$profile->telepon}}" autocomplete="off" placeholder="Masukan Telepon...">
        </div>
    </div>
    <div class="form-group">
        <label>Alamat</label>
        <textarea name="alamat" class="form-control" id="" cols="30" rows="6" placeholder="Masukan Alamat...">{{$profile->alamat}}</textarea>
    </div>
    <div class="row">
        <div class="col-6 form-group">
            <label>Whatsapp</label>
            <input type="text" name="whatsapp" class="form-control" value="{{$profile->whatsapp}}" autocomplete="off" placeholder="No Whatsapp...">
        </div>
        <div class="col-6 form-group">
            <label>Facebook</label>
            <input type="text" name="facebook" class="form-control" value="{{$profile->facebook}}" autocomplete="off" placeholder="Facebook...">
        </div>
    </div>
    <div class="form-group">
        <label>Instagram</label>
        <input type="text" name="instagram" class="form-control" value="{{$profile->instagram}}" autocomplete="off" placeholder="Instagram...">
    </div>
    <div class="row">
        <div class="col-6 form-group">
            <label>Provinsi</label>
            <select name="provinsi_id" class="custom-select">
            @foreach($provinsi as $value => $data)
                @if($profile->provinsi_id == $data->provinsi_id)
                    <option value="{{ $data->provinsi_id }}" selected="">{{ $data->provinsi_nama }}</option>
                @else
                    <option value="">Pilih</option>
                    <option value="{{ $data->provinsi_id }}">{{ $data->provinsi_nama }}</option>}
                @endif
            @endforeach
            </select>
        </div>
        <div class="col-6 form-group">
            <label>Kabupaten</label>
            <select name="kabupaten_id" class="custom-select">
            @foreach($kabupaten as $value => $data)
                @if($profile->kabupaten_id == $data->kabupaten_id)
                    <option value="{{ $data->kabupaten_id }}" selected="">{{ $data->kabupaten_nama }}</option>
                @else
                    <option value="{{ $data->kabupaten_id }}">{{ $data->kabupaten_nama }}</option>}
                @endif
            @endforeach
            </select>
        </div>
    </div>
    <div class="row">
        <div class="col-6 form-group">
            <label>Kecamatan</label>
            <select name="kecamatan_id" class="custom-select">
            @foreach($kecamatan as $value => $data)
                @if($profile->kecamatan_id == $data->kecamatan_id)
                    <option value="{{ $data->kecamatan_id }}" selected="">{{ $data->kecamatan_nama }}</option>
                @else
                    <option value="{{ $data->kecamatan_id }}">{{ $data->kecamatan_nama }}</option>}
                @endif
            @endforeach
            </select>
        </div>
        <div class="col-6 form-group">
            <label>Desa</label>
            <select name="desa_id" class="custom-select">
            @foreach($desa as $value => $data)
                @if($profile->desa_id == $data->desa_id)
                    <option value="{{ $data->desa_id }}" selected="">{{ $data->desa_nama }}</option>
                @else
                    <option value="{{ $data->desa_id }}">{{ $data->desa_nama }}</option>}
                @endif
            @endforeach
            </select>
        </div>
    </div>
    
    <div class="form-group">
        <label>Jurusan</label>
        <select name="jurusan_id" class="custom-select">
        @foreach($jurusan as $value => $data)
            @if($profile->jurusan_id == $data->jurusan_id)
                <option value="{{ $data->jurusan_id }}" selected="">{{ $data->jurusan_nama }}</option>
            @else
                <option value="">Pilih</option>
                <option value="{{ $data->jurusan_id }}">{{ $data->jurusan_nama }}</option>}
            @endif
        @endforeach
        </select>
    </div>
    <div class="form-group">
        <label>Kelas</label>
        <select name="kelas_id" class="custom-select">
        @foreach($kelas as $value => $data)
            @if($profile->kelas_id == $data->kelas_id)
                <option value="{{ $data->kelas_id }}" selected="">{{ $data->kelas_nama }}</option>
            @else
                <option value="{{ $data->kelas_id }}">{{ $data->kelas_nama }}</option>}
            @endif
        @endforeach
        </select>
    </div>

    <button class="btn btn-info mb-4 float-right" style="background: #5caeea;"><i class="far fa-check-circle"></i> Ubah</button>
</form>

@stop