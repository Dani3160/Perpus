@extends('layouts.operator.master')
@section('judul')
Ubah Penulis Data Pendukung Biblio - Operator
@stop  
@section('konten')
    {{-- Tabel Penulis --}}
    <div class="row justify-content-center mt-5">
        <div class="col-md-6 mt-5">
            <div class="card shadow">
                <div class="card-body">
                    <h5 class="text-dark"><i class="fas fa-pen-square"></i> Ubah Penulis</h5>
                    <hr>
                    <form action="{{ route('operator.pendukung.biblio.penulis.proses') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <input type="hidden" name="penulis_id" value="{{ $penulis->penulis_id }}">
                            <label for="penulis_nama">Nama Penulis*</label>
                            <input type="text" name="penulis_nama" class="form-control" value="{{ $penulis->penulis_nama }}" required>
                        </div>  
                        <button type="submit" class="btn btn-success btn-sm float-right"><i class="fas fa-save"></i> Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    {{-- Bagian Akhir Tabel Penulis --}}
@stop