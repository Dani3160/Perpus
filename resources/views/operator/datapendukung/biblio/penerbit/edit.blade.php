@extends('layouts.operator.master')
@section('judul')
Ubah Penerbit Data Pendukung Biblio - Operator
@stop  
@section('konten')
    {{-- Tabel penerbit --}}
    <div class="row justify-content-center mt-5">
        <div class="col-md-6 mt-5">
            <div class="card shadow">
                <div class="card-body">
                    <h5 class="text-dark"><i class="fas fa-user-circle"></i> Ubah Penerbit</h5>
                    <hr>
                    <form action="{{ route('operator.pendukung.biblio.penerbit.proses') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <input type="hidden" name="penerbit_id" value="{{ $penerbit->penerbit_id }}">
                            <label for="penerbit_nama">Nama Penerbit*</label>
                            <input type="text" name="penerbit_nama" class="form-control @error('penerbit_nama') is-invalid @enderror" value="{{ $penerbit->penerbit_nama }}" required>
                        </div>  
                        <button type="submit" class="btn btn-success btn-sm float-right"><i class="fas fa-save"></i> Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    {{-- Bagian Akhir Tabel penerbit --}}
@stop