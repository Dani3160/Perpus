@extends('layouts.operator.master')
@section('judul')
Ubah Penulis Data Pendukung Biblio - Operator
@stop  
@section('konten')
    {{-- Tabel Penulis --}}
    <div class="x_panel">
        <div class="x_title">
            <h2>Edit Penulis</h2>
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
            <form action="{{ route('operator.pendukung.biblio.penulis.proses') }}" method="POST">
                @csrf
                <div class="form-group">
                    <input type="hidden" name="penulis_id" value="{{ $penulis->penulis_id }}">
                    <label for="penulis_nama">Nama Penulis*</label>
                    <input type="text" name="penulis_nama" class="form-control" value="{{ $penulis->penulis_nama }}">
                </div>  
                <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
        </div>
    </div>
    {{-- Bagian Akhir Tabel Penulis --}}
@stop