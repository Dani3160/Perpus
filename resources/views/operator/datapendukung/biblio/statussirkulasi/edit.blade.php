@extends('layouts.operator.master')
@section('judul')
Ubah Status Sirkulasi Data Pendukung Biblio - Operator
@stop  
@section('konten')
    {{-- Tabel Status Sirkulasi --}}
    <div class="row justify-content-center mt-5">
        <div class="col-md-6 mt-5">
            <div class="card shadow">
                <div class="card-body">
                    <h5 class="text-dark"><i class="far fa-clone"></i> Ubah Status Sirkulasi</h5>
                    <hr>
                    <form action="{{ route('operator.pendukung.biblio.statussirkulasi.proses') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <input type="hidden" name="status_sirkulasi_id" value="{{ $statussirkulasi->status_sirkulasi_id }}">
                            <label for="status_sirkulasi_nama">Status Sirkulasi*</label>
                            <input type="text" name="status_sirkulasi_nama" class="form-control" value="{{ $statussirkulasi->status_sirkulasi_nama }}" required>
                        </div>  
                        <button type="submit" class="btn btn-success btn-sm float-right"><i class="fas fa-save"></i> Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
 
    {{-- Bagian Akhir Tabel Status Sirkulasi --}}
@stop