@extends('layouts.operator.master')

@section('judul')
Konfirmasi Pemesanan
@stop

@section('konten')

<div class="container-fluid mt-5">
    
    <br>

    <br>

    <div class="col-md-12">
        <h1 class="display-4s">Konfirmasi Pemesanan</h1>
    </div><br>

    <a href="{{route('operator.riwayat.konfirmasi')}}">Lihat Riwayat</a>

    <br><br>

    <div class="col-md-12 mt-5">
        <table class="table table-bordered table-striped dt-row" id="konfirmasi">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Anggota</th>
                    <th>Nama Buku</th>
                    <th>Edisi</th>
                    <th>Tahun Terbit</th>
                    <th>Aksi</th>
                </tr>
            </thead>
        </table>    
    </div>

</div>

@stop 

@push('scripts')
<script type="text/javascript">
  $(function() {
   $('#konfirmasi').DataTable({
    order: [[0, 'desc']],
    processing: true,
    responsive: true,
    serverSide: true,
    ajax: '{!! route('operator.konfirmasi') !!}',
    columns: [
    {data: 'DT_RowIndex', name: 'sirkulasi_id', width: '5px'},
    {data: 'anggota_nama', name: 'anggota_nama', width: '140px'},
    {data: 'judul', name: 'judul', },
    {data: 'edisi', name: 'edisi', },
    {data: 'penerbit_tahun', name: 'penerbit_tahun', },
    {data: 'aksi', name: 'aksi', orderable: false, searchable: false},
    ]
  });
 });
</script>
@endpush