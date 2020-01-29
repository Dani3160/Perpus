@extends('layouts.operator.master')
@section('judul')
Ubah Klasifikasi Data Pendukung Biblio - Operator
@stop  
@section('konten')
    {{-- Tabel klasifikasi --}}
    <div class="row justify-content-center mt-5">
        <div class="col-md-6 mt-5">
            <div class="card shadow">
                <div class="card-body">
                    <h5 class="text-dark"><i class="fas fa-calendar-check"></i> Ubah Klasifikasi</h5>
                    <hr>
                    <form action="{{ route('operator.pendukung.biblio.klasifikasi.proses') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <input type="hidden" name="klasifikasi_id" value="{{ $klasifikasi->klasifikasi_id }}">
                            <label for="klasifikasi_nama">Nama Klasifikasi*</label>
                            <input type="text" name="klasifikasi_nama" class="form-control" value="{{ $klasifikasi->klasifikasi_nama }}" required>
                        </div>  
                        <button type="submit" class="btn btn-success btn-sm float-right"><i class="fas fa-save"></i> Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    {{-- Bagian Akhir Tabel klasifikasi --}}
@stop