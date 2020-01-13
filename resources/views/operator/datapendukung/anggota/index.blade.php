@extends('layouts.operator.master')
@section('judul')
	Data Pendukung Anggota - Operator
@stop

@section('subJudul')
	<h1>Data Pendukung Anggota</h1>
	<a href="{{ route('operator.tambah.DataPendukung') }}" class="btn btn-primary">Tambah</a>
@stop

@section('konten')
	<div class="row">
		{{-- Tabel Jurusan --}}
		<div class="col-md-6 col-sm-6 col-xs-12">
			<div class="x_panel">
				<div class="x_title">
					<h2>Data Jurusan</h2>
					<ul class="nav navbar-right panel_toolbox">
						<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
						</li>
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
							<ul class="dropdown-menu" role="menu">
								<li><a href="#">Ekport Data</a>
								</li>
								<li><a href="#">Import Data</a>
								</li>
							</ul>
						</li>
						<li><a class="close-link"><i class="fa fa-close"></i></a>
						</li>
					</ul>
					<div class="clearfix"></div>
				</div>
				<div class="x_content">

					<table class="table table-bordered" id="jurusan">
						<thead>
							<tr>
								<th>No</th>
								<th>Nama Jurusan</th>
								<th>Opsi</th>
							</tr>
						</thead>
					</table>
				</div>
			</div>
		</div>
		{{-- Bagian Akhir Tabel Jurusan --}}

		{{-- Tabel Kelas --}}
		<div class="col-md-6 col-sm-6 col-xs-12">
			<div class="x_panel">
				<div class="x_title">
					<h2>Data Kelas</h2>
					<ul class="nav navbar-right panel_toolbox">
						<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
						</li>
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
							<ul class="dropdown-menu" role="menu">
								<li><a href="#">Ekport Data</a>
								</li>
								<li><a href="#">Import Data</a>
								</li>
							</ul>
						</li>
						<li><a class="close-link"><i class="fa fa-close"></i></a>
						</li>
					</ul>
					<div class="clearfix"></div>
				</div>
				<div class="x_content">

					<table class="table table-bordered" id="kelas">
						<thead>
							<tr>
								<th>No</th>
								<th>Kelas</th>
								<th>Jurusan</th>
								<th>Opsi</th>
							</tr>
						</thead>
					</table>
				</div>
			</div>
		</div>
		{{-- Bagian Akhir Tabel Kelas --}}

		{{-- Tabel Anggota-Tipe --}}
		<div class="col-md-6 col-sm-6 col-xs-12">
			<div class="x_panel">
				<div class="x_title">
					<h2>Data Anggota-Tipe</h2>
					<ul class="nav navbar-right panel_toolbox">
						<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
						</li>
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
							<ul class="dropdown-menu" role="menu">
								<li><a href="#">Ekport Data</a>
								</li>
								<li><a href="#">Import Data</a>
								</li>
							</ul>
						</li>
						<li><a class="close-link"><i class="fa fa-close"></i></a>
						</li>
					</ul>
					<div class="clearfix"></div>
				</div>
				<div class="x_content">

					<table class="table table-bordered" id="anggotaTipe">
						<thead>
							<tr>
								<th>No</th>
								<th>Tipe Anggota</th>
								<th>Opsi</th>
							</tr>
						</thead>
					</table>
				</div>
			</div>
		</div>
		{{-- Bagian Akhir Tabel Anggota-Tipe --}}
	</div>
@stop


@push('scripts')
<!-- Tabel Tipe-Anggota -->
	<script type="text/javascript">
		$(function(){
		$('#anggotaTipe').DataTable({
			order: [[0, 'asc']],
			processing: true,
			responsive: true,
			serverSide: true,
			"bDestroy": true,
			ajax: '{!! route('operator.pendukung.datatable.tipeAnggota') !!}',
			columns: [
			{data: 'DT_RowIndex', name: 'DT_RowIndex', width: '5px',},
			{data: 'anggota_tipe_nama', name: 'anggota_tipe_nama', width: '50px', orderable: true},
			{data: 'action', name: 'action', width: '100px', orderable: false, searchable: false,},
			]
		});
	});
	</script>

<!-- Tabel Jurusan -->
	<script type="text/javascript">
		$(function(){
		$('#jurusan').DataTable({
			order: [[0, 'asc']],
			processing: true,
			responsive: true,
			serverSide: true,
			"bDestroy": true,
			ajax: '{!! route('operator.pendukung.datatable.jurusan') !!}',
			columns: [
			{data: 'DT_RowIndex', name: 'DT_RowIndex', width: '5px',},
			{data: 'jurusan_nama', name: 'jurusan_nama', width: '50px', orderable: true},
			{data: 'action', name: 'action', width: '100px', orderable: false, searchable: false,},
			]
		});
	});
	</script>

<!-- Tabel Kelas -->
	<script type="text/javascript">
		$(function(){
		$('#kelas').DataTable({
			order: [[0, 'asc']],
			processing: true,
			responsive: true,
			serverSide: true,
			"bDestroy": true,
			ajax: '{!! route('operator.pendukung.datatable.kelas') !!}',
			columns: [
			{data: 'DT_RowIndex', name: 'DT_RowIndex', width: '5px',},
			{data: 'kelas_nama', name: 'kelas_nama', width: '50px', orderable: true},
			{data: 'jurusan_nama', name: 'jurusan_nama', width: '50px', orderable: true},
			{data: 'action', name: 'action', width: '100px', orderable: false, searchable: false,},
			]
		});
	});
	</script>

@endpush