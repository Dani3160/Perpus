@extends('layouts.operator.master')
@section('judul')
Ubah Penerbit Data Pendukung Biblio - Operator
@stop  
@section('konten')
    {{-- Tabel penerbit --}}
    <div class="x_panel">
        <div class="x_title">
            <h2>Tambah Penerbit</h2>
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
            <form action="{{ route('operator.pendukung.biblio.penerbit.proses') }}" method="POST">
                @csrf
                <div class="form-group">
                    <input type="hidden" name="penerbit_id" value="{{ $penerbit->penerbit_id }}">
                    <label for="penerbit_nama">Nama Penerbit*</label>
                    <input type="text" name="penerbit_nama" class="form-control @error('penerbit_nama') is-invalid @enderror" value="{{ $penerbit->penerbit_nama }}">
                </div>  
                <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
        </div>
    </div>
    {{-- Bagian Akhir Tabel penerbit --}}
@stop