@extends('layouts.operator.master')
@section('judul')
Ubah Status Item Data Pendukung Biblio - Operator
@stop  
@section('konten')
    {{-- Tabel Status Item --}}
    <div class="row justify-content-center mt-5">
        <div class="col-md-6 mt-5">
            <div class="card shadow">
                <div class="card-body">
                    <h5 class="text-dark"><i class="fas fa-calendar-alt"></i> Ubah Status Item</h5>
                    <hr>
                    <form action="{{ route('operator.pendukung.biblio.statusitem.proses') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <input type="hidden" name="status_item_id" value="{{ $statusitem->status_item_id }}">
                            <label for="status_item_nama">Nama Status Item*</label>
                            <input type="text" name="status_item_nama" class="form-control" value="{{ $statusitem->status_item_nama }}" required>
                        </div>  
                        <button type="submit" class="btn btn-success btn-sm float-right"><i class="fas fa-save"></i> Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    {{-- Bagian Akhir Tabel Status Item --}}
@stop