@extends('layouts.operator.master')
@section('judul')
Import Status Sirkulasi Data Pendukung Biblio - Operator  
@stop

@section('konten')
{{-- Form import --}}
    <div class="x_panel">
        <div class="x_title">
          <h2>Import Status Sirkulasi</h2>
          <ul class="nav navbar-right panel_toolbox">
            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
            </li>
            <li><a class="close-link"><i class="fa fa-close"></i></a>
            </li>
        </ul>
        <div class="clearfix"></div>
    </div>
    <div class="x_content">
        <form action="" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="file_status_sirkulasi">File*</label>
                <input type="file" name="file_status_sirkulasi" class="form-control">
                @error('file_status_sirkulasi')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>  
            <a href="{{ route('operator.pendukung.biblio') }}" class="btn btn-warning">Kembali</a>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
{{-- Bagian Akhir Form import --}}
</div>
@stop   