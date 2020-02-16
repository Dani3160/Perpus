@extends('layouts.operator.master')

@section('judul')
Resume - Operator  
@stop

@section('konten')
  <div class="container mb-5">
    <div class="row mt-4">
      <div class="col-md-12 mt-5">
        <div class="card shadow">
          <div class="card-body">
            <h5 class="text-dark">Edit Resume</h5>
            <hr>
            <form action="{{route('operator.resume.store')}}" method="post">
              @csrf 
              <input type="hidden" name="resume_id" value="{{ $resume->resume_id }}">
              <div class="row">
                <div class="form-group col-md-6">
                  <label for="frmAnggota">Nama Anggota*</label>
                  <select name="anggota_id" id="frmKelas" class="custom-select">
                    <option value="">Pilih Anggota</option>
                    @foreach($anggota as $value => $data)
                        @if($resume->anggota_id == $data->anggota_id)
                            <option value="{{$data->anggota_id}}" selected>{{$data->name}}</option>
                        @else 
                            <option value="{{$data->anggota_id}}">{{$data->name}}</option>
                        @endif
                    @endforeach
                  </select>
                </div>
                <div class="form-group col-md-6">
                  <label for="frmKelas">Kelas*</label>
                  <select name="kelas_id" id="frmKelas" class="custom-select">
                    @foreach($kelas as $value => $data)
                        @if($resume->kelas_id == $data->kelas_id)
                            <option value="{{ $data->kelas_id }}" selected="">{{ $data->kelas_nama }}</option>
                        @else
                            <option value="{{ $data->kelas_id }}">{{ $data->kelas_nama }}</option>}
                        @endif
                    @endforeach
                  </select>
                </div>
              </div>
              <div class="row">
                <div class="form-group col-md-12">
                  <label for="frmJudul">Judul*</label>
                  <input type="text" name="resume_judul" class="form-control" id="frmJudul" placeholder="Masukan judul resume" value="{{$resume->resume_judul}}">
                </div>
              </div>
              <div class="row">
                <div class="form-group col-md-6">
                  <label for="frmHari">Hari*</label>
                  <select name="hari" id="frmHari" class="custom-select">
                    <option value="">Pilih Hari</option>
                    <option value="Senin">Senin</option>
                    <option value="Selasa">Selasa</option>
                    <option value="Rabu">Rabu</option>
                    <option value="Kamis">Kamis</option>
                    <option value="Jum'at">Jum'at</option>
                    <option value="Sabtu">Sabtu</option>
                    <option value="Minggu">Minggu</option>
                  </select>
                </div>
                <div class="form-group col-md-6">
                  <label for="frmTgl">Tanggal Resume*</label>
                  <input value="{{$resume->tanggal_resume}}" type="date" class="form-control" id="frmTgl" name="tanggal_resume">
                </div>
              </div>
              
              <div class="form-group">
                <label for="frmIsi">Isi</label>
                <textarea name="resume_isi" id="frmIsi" cols="30" rows="10" class="form-control" placeholder="Masukkan isi resume...">{{$resume->resume_isi}}</textarea>
              </div>
              
              <div class="form-group">
                <button class="btn btn-success sm float-right"><i class="fas fa-save"></i> Simpan</button>
              </div>
            </form>
          </div>
        </div>        
      </div>
    </div>
  </div>

@stop 