@extends('layouts.operator.master')
@section('judul')
Novel - Operator  
@stop

@section('konten')


<div class="container mt-5">
    <div class="row">
        <div class="col-md-12">
            <h4 class="text-dark">Data Novel</h4>            

            <div class="table table-responsive mt-4">
                <table class="table table-bordered" id="novelDatatable">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Anggota</th>
                            <th>Judul</th>
                            <th>Karya</th>
                            <th>Konfirmasi</th>
                            <th>Aksi</th>
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
   $('#novelDatatable').DataTable({
    order: [[0, 'desc']],
    processing: true,
    stateSave: true,
    "bDestroy": true,
    responsive: true,
    serverSide: true,
    ajax: '{!! route('operator.novel.datatable') !!}',
    columns: [
    {data: 'DT_RowIndex', name: 'novel_id', width: '150px'},
    {data: 'anggota_nama', name: 'anggota_nama', width: '140px'},
    {data: 'novel_judul', name: 'novel_judul', },
    {data: 'novel_karya', name: 'novel_karya', },
    {data: 'konfirmasi', name: 'konfirmasi', },
    {data: 'action', name: 'action', width: '100px', orderable: false, searchable: false},
    ]
  });
 });
</script>
@endpush