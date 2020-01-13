@extends('layouts.operator.master')
@section('judul')
Ubah Status Item Data Pendukung Biblio - Operator
@stop  
@section('konten')
    {{-- Tabel Status Item --}}
    <div class="x_panel">
        <div class="x_title">
            <h2>Ubah Status Item</h2>
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
            <form action="{{ route('operator.pendukung.biblio.statusitem.proses') }}" method="POST">
                @csrf
                <div class="form-group">
                    <input type="hidden" name="status_item_id" value="{{ $statusitem->status_item_id }}">
                    <label for="status_item_nama">Nama Status Item*</label>
                    <input type="text" name="status_item_nama" class="form-control" value="{{ $statusitem->status_item_nama }}">
                </div>  
                <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
        </div>
    </div>
    {{-- Bagian Akhir Tabel Status Item --}}
@stop