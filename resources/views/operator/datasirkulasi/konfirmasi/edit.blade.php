@extends('layouts.operator.master')

@section('judul')
Konfirmasi Pemesanan
@stop

@section('konten')
<div class="container mt-5 mb-5">
    <div class="row  mt-5">
        <div class="col-md-12 mt-3">
            <!-- <h3 class="display-4s">Konfirmasi Pemesanan</h3>-->

            <div class="col-md-8 mt-4">
                <div class="x_panel">
                    <!-- <div class="x_title">
                        <h4 class="display-4s text-center">Konfirmasi Pemesanan</h4>
                    </div> -->
                    <div class="x_content">
                        <form action="{{ route('operator.konfirmasi.proses', $konfirmasi->sirkulasi_id) }}" method="post">
                            @csrf
                            <input type="hidden" name="sirkulasi_id" value="{{$konfirmasi->sirkulasi_id}}">
                            <div class="form-group">
                                <label>Nama Anggota</label>
                                <select name="anggota_id" readonly class="form-control">
                                    <option value="{{$konfirmasi->anggota_id}}">{{$konfirmasi->anggota_nama}}</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Judul Buku</label>
                                <select name="biblio_id" readonly class="form-control">
                                    <option value="{{$konfirmasi->biblio_id}}">{{$konfirmasi->judul}}</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Edisi</label>
                                <input type="text" name="edisi" class="form-control" value="{{$konfirmasi->edisi}}" readonly>
                            </div>
                            <div class="form-group">
                                <label>Tahun Terbit</label>
                                <input type="text" name="" class="form-control" value="{{$konfirmasi->penerbit_tahun}}" readonly>
                            </div>
                            <div class="form-group">
                                <label>Apakah Anda Menyetujui Pemesanan ini?</label><br>
                                <input type="checkbox" name="promosi" value="1"> Iya
                                <input type="checkbox" name="promosi" value="0"> Tidak
                            </div>
                            <div class="form-group">
                                <button class="btn btn-primary">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            

        </div>
    </div>
</div>

@stop
