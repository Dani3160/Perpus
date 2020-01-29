@extends('layouts.operator.master')

@section('judul', 'Perpanjangan Buku')

@section('konten')
<div class="container">
    <div class="row">
        <div class="col-md-12 mt-5">
            <div class="card shadow">
                <div class="card-body">
                    <h5 class="text-dark"><i class="fas fa-book"></i> Perpanjang Peminjaman</h5>
                    <hr>
                    <form action="{{ route('operator.sirkulasi.perpanjangan.proses', $perpanjangan->sirkulasi_id) }}" method="post">
                        @csrf
                        <div class="col-md-12">
                            <div class="row">
                                <input type="hidden" name="sirkulasi_id" value="{{$perpanjangan->sirkulasi_id}}">
                                <div class="col-md-6 form-group">
                                    <label>Masukkan Nama Anggota</label>
                                    <select class="form-control" name="anggota_id" readonly> 
                                        <option value="{{$perpanjangan->anggota_id}}">{{$perpanjangan->anggota_nama}}</option>
                                    </select>
                                </div>
                                <div class="col-md-6 form-group">
                                    <label>Masukkan Buku Yang Akan Di Pinjam</label>
                                    <select class="form-control" name="biblio_id" readonly> 
                                        <option value="{{$perpanjangan->biblio_id}}">{{$perpanjangan->judul}}, {{$perpanjangan->eksemplar}}</option>
                                    </select>
                                </div>    
                            </div>
                        </div>
                        
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-6 form-group">
                                    <label>Tanggal Pinjam Buku</label>
                                    <input type="text" name="mulai_pinjam" class="form-control" value="{{$perpanjangan->mulai_pinjam}}" readonly>
                                </div>
                                <div class="col-md-6 form-group">
                                    <input type="hidden" name="aturan_id" class="form-control" value="{{$perpanjangan->aturan_id}}">
                                    <label>Dikembalikan tanggal</label>
                                    <input type="text" name="kembali_pinjam" class="form-control" value="{{$perpanjangan->kembali_pinjam}}" readonly>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-6 form-group">
                                    <label>Perpanjang</label>
                                    <input type="date" name="perpanjangan" class="form-control" value="{{$perpanjangan->perpanjangan}}">
                                </div>
                                <div class="col-md-6 form-group">
                                    <label>Status</label>
                                    <select class="form-control" name="status_sirkulasi_id" readonly> 
                                        <option value="{{$perpanjangan->status_sirkulasi_id}}">{{$perpanjangan->status_sirkulasi_nama}}</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-success btn-sm float-right"><i class="fas fa-save"></i> Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@stop