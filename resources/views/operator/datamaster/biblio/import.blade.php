@extends('layouts.operator.master')
@section('judul')
Import Biblio - Operator  
@stop

@section('konten')
{{-- Form import --}}
<div class="card">
        
    <div class="card-body">
    <h4>Import Data</h4>
        <form action="{{ route('operator.biblio.import.excel') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="file">File*</label>
                <input type="file" name="file" class="form-control" required>
            </div>  
            <a href="{{ route('operator.biblio') }}" class="btn btn-warning">Kembali</a>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
{{-- Bagian Akhir Form import --}}
</div>
@stop   