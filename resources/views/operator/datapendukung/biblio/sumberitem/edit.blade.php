@extends('layouts.operator.master')
@section('judul')
Ubah Status Item Data Pendukung Biblio - Operator
@stop  
@section('konten')
    {{-- Tabel Sumber Item --}}
    <div class="row justify-content-center mt-5">
        <div class="col-md-6 mt-5">
            <div class="card shadow">
                <div class="card-body">
                    <h5 class="text-dark"><i class="fas fa-check-square"></i> Ubah Sumber Item</h5>
                    <hr>
                    <form action="{{ route('operator.pendukung.biblio.sumberitem.proses') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <input type="hidden" name="sumber_item_id" value="{{ $sumberitem->sumber_item_id }}">
                            <label for="sumber_item_nama">Sumber Item*</label>
                            <input type="text" name="sumber_item_nama" class="form-control" value="{{ $sumberitem->sumber_item_nama }}" required>
                        </div>  
                        <button type="submit" class="btn btn-success btn-sm float-right"><i class="fas fa-save"></i> Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    {{-- Bagian Akhir Tabel Sumber Item --}}
@stop