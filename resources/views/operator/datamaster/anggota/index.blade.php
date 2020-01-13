@extends('layouts.operator.master')
@section('judul')
Anggota - Operator  
@stop

@section('konten')
{{-- Area Konten --}}
<div class="col-md-12 col-sm-12 col-xs-12">
	<div class="x_panel">
		<div class="x_title">
			<h2>Data Anggota</h2>
			<ul class="nav navbar-right panel_toolbox">
				<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
				</li>
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
					<ul class="dropdown-menu" role="menu">
						<li>
							<a href="#">Tambah Data</a>
						</li>
						<li>
							<a href="#">Import Data</a>
						</li>
						<li>
							<a href="#">Eksport Data</a>
						</li>
					</ul>
				</li>
				<li><a class="close-link"><i class="fa fa-close"></i></a>
				</li>
			</ul>
			<div class="clearfix"></div>
		</div>

		<div class="x_content">
			<!-- Tabel Anggota -->
			<table id="anggota" class="table table-striped table-bordered">
				<thead>
					<tr>
						<th class="text-center">No</th>
						<th class="text-center">Nama</th>
						<th class="text-center">Jurusan</th>
						<th class="text-center">Kelas</th>
						<th class="text-center">Pos-el</th>
						<th class="text-center">Opsi</th>
					</tr>
				</thead>
			</table>
			<!-- Bagian Akhir Tabel Anggota -->          
		</div>

	</div>
</div>
{{-- Batas Akhir Area Konten --}}
@stop
@push('scripts')
<script type="text/javascript">
	$(function(){
		$('#anggota').DataTable({
			order: [[0, 'acs']],
			processing: true,
			responsive: true,
			serverSide: true,
			"bDestroy": true,
			ajax: '{!! route('operator.anggota.datatables') !!}',
			columns: [
			{data: 'DT_RowIndex', name: 'DT_RowIndex', width: '5px',},
			{data: 'anggota_nama', name: 'anggota_nama', width: '50px', orderable: true},
			{data: 'jurusan_nama', name: 'jurusan_id', width: '30px', orderable: true},
			{data: 'kelas_nama', name: 'kelas_id', width: '30px', orderable: true},
			{data: 'posel', name: 'posel', width: '30px', orderable: true},
			{data: 'action', name: 'action', width: '100px', orderable: false, searchable: false,},
			]
		});
	});
</script>	
@endpush