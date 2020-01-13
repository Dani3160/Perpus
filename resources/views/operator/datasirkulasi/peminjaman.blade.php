@extends('layouts.operator.master')

@section('judul')
Peminjaman Buku
@stop

@section('konten')

<div class="row mt-5">
    <div class="col-xs-12" style="margin-top: 15px;">
        <div class="x_panel">
            <div class="x_title">
                <h2><i class="fa fa-book"></i> Peminjaman Buku</h2>
                <ul class="nav navbar-right panel_toolbox">
					<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
					</li>
					<li><a class="close-link"><i class="fa fa-close"></i></a>
					</li>
				</ul>
				<div class="clearfix"></div>
            </div>
            <div class="x_content">
                <form action="{{route('operator.sirkulasi.peminjaman.proses')}}" method="post">
                    @csrf
                    <div class="col-md-12 col-sm-12 col-xs-12 form-group" style="margin-top: 18px;">
                        <div class="row">
                            <div class="col-md-6">
                                <label>Masukkan Nama Anggota</label><br>
                                <input type="text" class="form-control" id="searchA" name="anggota_id">
                            </div>
                            <div class="col-md-6">
                                <label>Masukkan Buku Yang Akan Di Pinjam</label><br>
                                <input type="text" class="form-control" id="searchB" name="biblio_id" value="">
                            </div>
                        </div>
                    </div><br>
                    <br>
                    <div class="col-md-12 col-sm-12 col-xs-12 form-group" style="margin-top: 10px; margin-bottom: 10px;">
                        <div class="row">
                            <div class="col-md-6">
                                <label>Mulai Pinjam Pada Tanggal</label><br>
                                <input type="date" name="mulai_pinjam" class="form-control">
                            </div>
                            <div class="col-md-6">
                                <label>Status</label><br>
                                
                                <select name="status_sirkulasi_id" id="status" class="form-control">
                                    @foreach($status as $s)
                                    <option value="{{$s->status_sirkulasi_id}}">{{$s->status_sirkulasi_nama}}</option>
                                    @endforeach
                                </select>
                            </div><br>
                        </div>
                    </div><br>
                    <div class="col-md-12" style="margin-top: 15px; margin-bottom: 10px;">
                        <button class="btn btn-primary btn pull-right"><i class="fa fa-save"></i> Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@stop 

@push('scripts')

<script type="text/javascript">
 $(document).ready(function() {
    $("#searchA").autocomplete({
 
        source: function(request, response) {
            $.ajax({
            url: "{{url('sirkulasi/search/anggota')}}",
            data: {
                    term : request.term
             },
            dataType: "json",
            success: function(data){
               response(data);
            },
            select: function(event, ui){
                event.preventDefault();
                $('#searchA').val(ui.item.label);
            }
        });
    },
    minLength: 1
 });
 
});
</script>

<script type="text/javascript">
 $(document).ready(function() {
    $("#searchB").autocomplete({
 
        source: function(request, response) {
            $.ajax({
            url: "{{url('sirkulasi/search/biblio')}}",
            data: {
                    term : request.term
             },
            dataType: "json",
            success: function(data){
               response(data);
            },
            select: function(event, ui){
                event.preventDefault();
                $('#searchB').val(ui.item.label);
            }
        });
    },
    minLength: 1
 });
});
</script>

@endpush
