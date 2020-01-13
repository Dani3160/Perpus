@extends('layouts.operator.master')
@section('judul')
Ubah Status Sirkulasi Data Pendukung Biblio - Operator
@stop  
@section('konten')
    {{-- Tabel Status Sirkulasi --}}
    <div class="x_panel">
        <div class="x_title">
            <h2>Ubah Status Sirkulasi</h2>
            <ul class="nav navbar-right panel_toolbox">
                <li>
                    <a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                </li>
                <li>
                    <a class="close-link"><i class="fa fa-close"></i></a>
                </li>
            </ul>
            <div class="clearfix"></div>
        </div>
        <div class="x_content">
            <form action="{{ route('operator.pendukung.biblio.statussirkulasi.proses') }}" method="POST">
                @csrf
                <div class="form-group">
                    <input type="hidden" name="status_sirkulasi_id" value="{{ $statussirkulasi->status_sirkulasi_id }}">
                    <label for="status_sirkulasi_nama">Status Sirkulasi*</label>
                    <input type="text" name="status_sirkulasi_nama" class="form-control" value="{{ $statussirkulasi->status_sirkulasi_nama }}">
                </div>  
                <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
        </div>
    </div>
    {{-- Bagian Akhir Tabel Status Sirkulasi --}}
@stop