@extends('layouts.operator.master')
@section('judul')
Ubah Tipe Koleksi Data Pendukung Biblio - Operator
@stop  
@section('konten')
    {{-- Tabel tipekoleksi --}}
    <div class="x_panel">
        <div class="x_title">
            <h2>Ubah TipeKoleksi</h2>
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
            <form action="{{ route('operator.pendukung.biblio.tipekoleksi.proses') }}" method="POST">
                @csrf
                <div class="form-group">
                    <input type="hidden" name="tipekoleksi_id" value="{{ $tipekoleksi->tipekoleksi_id }}">
                    <label for="tipekoleksi_nama">Tipe Koleksi*</label>
                    <input type="text" name="tipekoleksi_nama" class="form-control" value="{{ $tipekoleksi->tipekoleksi_nama }}">
                </div>  
                <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
        </div>
    </div>
    {{-- Bagian Akhir Tabel tipekoleksi --}}
@stop