@extends('layouts.operator.master')
@section('judul')
Ubah Tipe Koleksi Data Pendukung Biblio - Operator
@stop  
@section('konten')
    {{-- Tabel tipekoleksi --}}
    <div class="row justify-content-center mt-5">
        <div class="col-md-6 mt-5">
            <div class="card shadow">
                <div class="card-body">
                    <h5 class="text-dark"><i class="far fa-clipboard"></i> Ubah Tipe Koleksi</h5>
                    <hr>
                    <form action="{{ route('operator.pendukung.biblio.tipekoleksi.proses') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <input type="hidden" name="tipekoleksi_id" value="{{ $tipekoleksi->tipekoleksi_id }}">
                            <label for="tipekoleksi_nama">Tipe Koleksi*</label>
                            <input type="text" name="tipekoleksi_nama" class="form-control" value="{{ $tipekoleksi->tipekoleksi_nama }}" required>
                        </div>  
                        <button type="submit" class="btn btn-success btn-sm float-right"><i class="fas fa-save"></i> Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    {{-- Bagian Akhir Tabel tipekoleksi --}}
@stop