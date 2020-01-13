@extends('layouts.operator.master')
@section('judul')
Ubah Status Item Data Pendukung Biblio - Operator
@stop  
@section('konten')
    {{-- Tabel Sumber Item --}}
    <div class="x_panel">
        <div class="x_title">
            <h2>Ubah Sumber Item</h2>
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
            <form action="{{ route('operator.pendukung.biblio.sumberitem.proses') }}" method="POST">
                @csrf
                <div class="form-group">
                    <input type="hidden" name="sumber_item_id" value="{{ $sumberitem->sumber_item_id }}">
                    <label for="sumber_item_nama">Sumber Item*</label>
                    <input type="text" name="sumber_item_nama" class="form-control" value="{{ $sumberitem->sumber_item_nama }}">
                </div>  
                <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
        </div>
    </div>
    {{-- Bagian Akhir Tabel Sumber Item --}}
@stop