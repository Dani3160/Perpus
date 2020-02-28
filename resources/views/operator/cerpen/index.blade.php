@extends('layouts.operator.master')
@section('judul')
Cerpen - Operator  
@stop

@section('konten')


<div class="container mt-5">
    <div class="row">
        <div class="col-md-12">
            <h4 class="text-dark">Data Cerpen</h4>            

            <div class="table table-responsive mt-4">
                <table class="table table-bordered" id="cerpenDatatable">
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
<script>
$(document).ready(function(){
    $('.toast').toast('show', 1500);
});
</script>

<script type="text/javascript">
  $(function() {
   $('#cerpenDatatable').DataTable({
    order: [[0, 'desc']],
    processing: true,
    stateSave: true,
    "bDestroy": true,
    responsive: true,
    serverSide: true,
    ajax: '{!! route('operator.cerpen.datatable') !!}',
    columns: [
    {data: 'DT_RowIndex', name: 'cerpen_id', width: '150px'},
    {data: 'name', name: 'name', width: '140px'},
    {data: 'cerpen_judul', name: 'cerpen_judul', },
    {data: 'cerpen_karya', name: 'cerpen_karya', },
    {data: 'konfirmasi', name: 'konfirmasi', },
    {data: 'action', name: 'action', width: '100px', orderable: false, searchable: false},
    ]
  });
 });
</script>
@endpush