@extends('layouts.operator.master')

@section('judul', 'Peminjaman Buku')

@section('subJudul')
    <h1 class="display-4s">Riwayat</h1>
@stop

@section('konten')

<div class="container-fluid mt-5 mb-5">

    <br>

    <div class="row">
        <a href="{{route('operator.lihat.peminjaman')}}" class="btn btn-primary">Riwayat Peminjaman</a>
        <a href="{{route('operator.lihat.pengembalian')}}" class="btn btn-success">Riwayat Pengembalian</a>
    </div>

    <br>

    <div class="col-md-12">
        <h4 class="display-4s mb-4">Riwayat Pengembalian Buku</h4>
    </div>
    
    <br>

   <div class="row">
       <div class="x_panel">
            <div class="x_title">
              <h2>Data Penulis</h2>
              <ul class="nav navbar-right panel_toolbox">
                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                </li>
                <li><a class="close-link"><i class="fa fa-close"></i></a>
                </li>
              </ul>
              <div class="clearfix"></div>
            </div>
            
            <div class="x_content">
                <table class="table table-striped table-bordered dt-row" id="pengembalian">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Anggota</th>
                            <th>Nama Buku</th>
                            <th>Eksemplar</th>
                            <th>Mulai Pinjam</th>
                            <th>Di Kembalikan</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
   </div> 
        
   
</div>

@stop
@push('scripts')
<script type="text/javascript">
  $(function() {
   $('#pengembalian').DataTable({
    order: [[0, 'desc']],
    processing: true,
    responsive: true,
    "bDestroy": true,
    serverSide: true,
    ajax: '{!! route('operator.sirkulasi.riwayat.pengembalian') !!}',
    columns: [
    {data: 'DT_RowIndex', name: 'sirkulasi_id', width: '5px'},
    {data: 'anggota_nama', name: 'anggota_nama', width: '140px'},
    {data: 'judul', name: 'judul', },
    {data: 'eksemplar', name: 'eksemplar', },
    {data: 'mulai_pinjam', name: 'mulai_pinjam', },
    {data: 'kembali_pinjam', name: 'kembali_pinjam', },
    ]
  });
 });
</script>
@endpush