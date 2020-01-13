@extends('layouts.operator.master')

@section('judul', 'Pengembalian Buku')

@section('konten')

<div class="row mt-5">
    <div class="col-md-12 mt-4" style="margin-top: 25px; margin-bottom: 25px;">
        <div class="x_panel">
            <div class="x_title">
                <h2>Pengembalian Buku</h2>
                <ul class="nav navbar-right panel_toolbox">
					<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
					</li>
					<li><a class="close-link"><i class="fa fa-close"></i></a>
					</li>
				</ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <form action="{{route('operator.sirkulasi.pengembalian.proses')}}" method="post">
                    @csrf
                    <div class="form-group">
                        <label>Masukkan Nama Anggota</label><br>
                        <input type="text" class="form-control" id="searchA" name="anggota_id">
                    </div><br>
                    <div class="form-group">
                        <label>Masukkan Buku Yang Akan Di Kembalikan</label><br>
                        <input type="text" class="form-control" id="searchBiblio" name="biblio_id">
                    </div><br>
                    <div class="form-group">
                        <label>Di Kembalikan Pada Tanggal</label><br>
                        <input type="date" name="kembali_pinjam" class="form-control">
                    </div><br>
                    <div class="form-group">
                        <label>Status</label><br>
                        
                        <select name="status_sirkulasi_id" id="status" class="form-control">
                            @foreach($status as $s)
                            <option value="{{$s->status_sirkulasi_id}}">{{$s->status_sirkulasi_nama}}</option>
                            @endforeach
                        </select>
                    </div><br>
                    <div class="form-group">
                        <button class="btn btn-primary btn pull-right">Simpan</button>
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
    $("#searchBiblio").autocomplete({
 
        source: function(request, response) {
            $.ajax({
            url: "{{url('sirkulasi/search/biblio/back')}}",
            data: {
                    term : request.term
             },
            dataType: "json",
            success: function(data){
               response(data);
            },
            select: function(event, ui){
                event.preventDefault();
                $('#searchBiblio').val(ui.item.label);
            }
        });
    },
    minLength: 1
 });
});
</script>
@endpush