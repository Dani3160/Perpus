@extends('layouts.operator.master')
@section('judul')
Riwayat Biblio - Operator  
@stop

@section('konten')
{{-- Area Konten --}}
<div class="col-md-12 col-sm-12 col-xs-12">
	<div class="row">
		<div class="col-md-6 col-sm-6 col-xs-12">
			<a href="{{ route('operator.biblio') }}" class="btn btn-warning">Kembali</a>
		</div>
		<div class="col-md-6 col-sm-6 col-xs-12">
			<h2 class="navbar-right">Riwayat Data Biblio</h2>
		</div>
	</div>
	<div class="x_panel">
		<div class="x_title">
			<ul class="nav navbar-right panel_toolbox">
				<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
				</li>
				<li><a class="close-link"><i class="fa fa-close"></i></a>
				</li>
			</ul>
			<div class="clearfix"></div>
		</div>
		<div class="x_content">
			<!-- Tabel Biblio -->
			<table id="biblio_riwayat" class="table table-striped table-bordered">
				<thead>
					<tr>
						<th>No</th>
						<th>Judul</th>
						<th>Edisi</th>
						<th>ISBN</th>
						<th>Eksemplar</th>
						<th>Status</th>
						<th>Penghapusan</th>
					</tr>
				</thead>
			</table>
			<!-- Bagian Akhir Tabel Biblio -->          
		</div>
	</div>
</div>
{{-- Batas Akhir Area Konten --}}
@stop
@push('scripts')
<script type="text/javascript">
	$(function(){
		$('#biblio_riwayat').DataTable({
			order: [[0, 'asc']],
			processing: true,
			responsive: true,
			serverSide: true,
			'bDestroy': true,
			ajax: '{!! route('operator.biblio.riwayat.datatable') !!}',
			columns: [
			{data: 'DT_RowIndex', name: 'DT_RowIndex', width: '5px',},
			{data: 'judul', name: 'judul', width: '100px', orderable: true},
			{data: 'edisi', name: 'edisi', width: '3px', orderable: true},
			{data: 'isbn', name: 'isbn', width: '100px', orderable: true},
			{data: 'eksemplar', name: 'eksemplar', width: '30px', orderable: true},
			{data: 'status_item_nama', name: 'status_item_id', width: '40px', orderable: true},
			{data: 'perubahan', name: 'perubahan', width: '100px', orderable: true},
			]
		});
	});
</script>	
@endpush