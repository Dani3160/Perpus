@extends('layouts.operator.master')
@section('judul')
	Data Pendukung Biblio - Operator
@stop

@section('konten')
	<div class="row">
		<div class="col-md-6 col-sm-6 col-xs-12">
			<h1>Data Pendukung Biblio</h1>
		</div>
		<div class="col-md-6 col-sm-6 col-xs-12">
			<div class="row">
				<div class="col-md-10">
					<a href="{{ route('operator.pendukung.biblio.riwayat') }}" class="btn btn-warning navbar-right">Riwayat Data</a>
				</div>
				<div class="col-md-2">
					<a href="{{ route('operator.pendukung.biblio.tambah') }}" class="btn btn-primary navbar-right">Tambah</a>
				</div>
			</div> 
		</div>
	</div>
	<div class="row">
		{{-- Tabel Penulis --}}
			<div class="col-md-6 col-sm-6 col-xs-12">
			  <div class="x_panel">
			    <div class="x_title">
			      <h2>Data Penulis</h2>
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

			      <table class="table table-bordered" id="penulis">
			        <thead>
			          <tr>
			            <th>No</th>
			            <th>Nama Penulis</th>
			            <th>Opsi</th>
			          </tr>
			        </thead>
			      </table>
			    </div>
			  </div>
			</div>
		{{-- Bagian Akhir Tabel Penulis --}}

		{{-- Tabel Penerbit --}}
			<div class="col-md-6 col-sm-6 col-xs-12">
			  <div class="x_panel">
			    <div class="x_title">
			      <h2>Data Penerbit</h2>
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

			      <table class="table table-bordered" id="penerbit">
			        <thead>
			          <tr>
			            <th>No</th>
			            <th>Nama Penerbit</th>
			            <th>Opsi</th>
			          </tr>
			        </thead>
			      </table>
			    </div>
			  </div>
			</div>
		{{-- Bagian Akhir Tabel Penerbit --}}
	</div>

	<div class="row">
		{{-- Tabel klasifikasi --}}
			<div class="col-md-6 col-sm-6 col-xs-12">
			  <div class="x_panel">
			    <div class="x_title">
			      <h2>Data Klasifikasi</h2>
			      <ul class="nav navbar-right panel_toolbox">
			        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
			        </li>
			        <li class="dropdown">
			          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
			          <ul class="dropdown-menu" role="menu">
			            <li><a href="#">Ekport Data</a>
			            </li>
			            <li><a href="">Import Data</a>
			            </li>
			          </ul>
			        </li>
			        <li><a class="close-link"><i class="fa fa-close"></i></a>
			        </li>
			      </ul>
			      <div class="clearfix"></div>
			    </div>
			    <div class="x_content">

			      <table class="table table-bordered" id="klasifikasi">
			        <thead>
			          <tr>
			            <th>No</th>
			            <th>Klasifikasi</th>
			            <th>Opsi</th>
			          </tr>
			        </thead>
			      </table>
			    </div>
			  </div>
			</div>
		{{-- Bagian Akhir Tabel klasifikasi --}}

		{{-- Tabel Status Item --}}
			<div class="col-md-6 col-sm-6 col-xs-12">
			  <div class="x_panel">
			    <div class="x_title">
			      <h2>Data Status Item</h2>
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

			      <table class="table table-bordered" id="statusitem">
			        <thead>
			          <tr>
			            <th>No</th>
			            <th>Status Item</th>
			            <th>Opsi</th>
			          </tr>
			        </thead>
			      </table>
			    </div>
			  </div>
			</div>
		{{-- Bagian Akhir Tabel Status Item --}}
	</div>

	<div class="row">
		{{-- Tabel Sumber Item --}}
			<div class="col-md-6 col-sm-6 col-xs-12">
			  <div class="x_panel">
			    <div class="x_title">
			      <h2>Data Sumber Item</h2>
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

			      <table class="table table-bordered" id="sumberitem">
			        <thead>
			          <tr>
			            <th>No</th>
			            <th>Sumber Item</th>
			            <th>Opsi</th>
			          </tr>
			        </thead>
			      </table>
			    </div>
			  </div>
			</div>
		{{-- Bagian Akhir Tabel Sumber Item --}}

		{{-- Tabel TipeKoleksi --}}
			<div class="col-md-6 col-sm-6 col-xs-12">
			  <div class="x_panel">
			    <div class="x_title">
			      <h2>Data Tipe Koleksi</h2>
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

			      <table class="table table-bordered" id="tipekoleksi">
			        <thead>
			          <tr>
			            <th>No</th>
			            <th>Tipe Koleksi</th>
			            <th>Opsi</th>
			          </tr>
			        </thead>
			      </table>
			    </div>
			  </div>
			</div>
		{{-- Bagian Akhir Tabel TipeKoleksi --}}

		{{-- Tabel status sirkulasi --}}
			<div class="col-md-6 col-sm-6 col-xs-12">
			  <div class="x_panel">
			    <div class="x_title">
			      <h2>Data Status Sirkulasi</h2>
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

			      <table class="table table-bordered" id="statussirkulasi">
			        <thead>
			          <tr>
			            <th>No</th>
			            <th>Status Sirkulasi</th>
			            <th>Opsi</th>
			          </tr>
			        </thead>
			      </table>
			    </div>
			  </div>
			</div>
		{{-- Bagian Akhir Tabel status sirkulasi --}}
	</div>
@stop
@push('scripts')
{{-- Tabel penulis --}}
	<script type="text/javascript">
		$(function(){
		$('#penulis').DataTable({
			order: [[0, 'asc']],
			processing: true,
			responsive: true,
			serverSide: true,
			'bDestroy': true,
			ajax: '{!! route('operator.pendukung.datatable.penulis') !!}',
			columns: [
			{data: 'DT_RowIndex', name: 'DT_RowIndex', width: '5px',},
			{data: 'penulis_nama', name: 'penulis_nama', width: '100px', orderable: true},
			{data: 'action', name: 'action', width: '100px', orderable: false, searchable: false,},
			]
		});
	});
	</script>
{{-- Tabel Penerbit --}}
	<script type="text/javascript">
		$(function(){
		$('#penerbit').DataTable({
			order: [[0, 'asc']],
			processing: true,
			responsive: true,
			serverSide: true,
			'bDestroy': true,
			ajax: '{!! route('operator.pendukung.datatable.penerbit') !!}',
			columns: [
			{data: 'DT_RowIndex', name: 'DT_RowIndex', width: '5px',},
			{data: 'penerbit_nama', name: 'penerbit_nama', width: '100px', orderable: true},
			{data: 'action', name: 'action', width: '100px', orderable: false, searchable: false,},
			]
		});
	});
	</script>
{{-- Tabel Status Item --}}
	<script type="text/javascript">
		$(function(){
		$('#statusitem').DataTable({
			order: [[0, 'asc']],
			processing: true,
			responsive: true,
			serverSide: true,
			'bDestroy': true,
			ajax: '{!! route('operator.pendukung.datatable.statusitem') !!}',
			columns: [
			{data: 'DT_RowIndex', name: 'DT_RowIndex', width: '5px',},
			{data: 'status_item_nama', name: 'status_item_nama', width: '100px', orderable: true},
			{data: 'action', name: 'action', width: '100px', orderable: false, searchable: false,},
			]
		});
	});
	</script>
{{-- Tabel Sumber Item --}}
	<script type="text/javascript">
		$(function(){
		$('#sumberitem').DataTable({
			order: [[0, 'asc']],
			processing: true,
			responsive: true,
			serverSide: true,
			'bDestroy': true,
			ajax: '{!! route('operator.pendukung.datatable.sumberitem') !!}',
			columns: [
			{data: 'DT_RowIndex', name: 'DT_RowIndex', width: '5px',},
			{data: 'sumber_item_nama', name: 'sumber_item_nama', width: '100px', orderable: true},
			{data: 'action', name: 'action', width: '100px', orderable: false, searchable: false,},
			]
		});
	});
	</script>
{{-- Tabel TipeKoleksi --}}
	<script type="text/javascript">
		$(function(){
		$('#tipekoleksi').DataTable({
			order: [[0, 'asc']],
			processing: true,
			responsive: true,
			serverSide: true,
			'bDestroy': true,
			ajax: '{!! route('operator.pendukung.datatable.tipekoleksi') !!}',
			columns: [
			{data: 'DT_RowIndex', name: 'DT_RowIndex', width: '5px',},
			{data: 'tipekoleksi_nama', name: 'tipekoleksi_nama', width: '100px', orderable: true},
			{data: 'action', name: 'action', width: '100px', orderable: false, searchable: false,},
			]
		});
	});
	</script>
{{-- Tabel Status Item --}}
	<script type="text/javascript">
		$(function(){
		$('#klasifikasi').DataTable({
			order: [[0, 'asc']],
			processing: true,
			responsive: true,
			serverSide: true,
			'bDestroy': true,
			ajax: '{!! route('operator.pendukung.datatable.klasifikasi') !!}',
			columns: [
			{data: 'DT_RowIndex', name: 'DT_RowIndex', width: '5px',},
			{data: 'klasifikasi_nama', name: 'klasifikasi_nama', width: '100px', orderable: true},
			{data: 'action', name: 'action', width: '100px', orderable: false, searchable: false,},
			]
		});
	});
	</script>
{{-- Tabel Status Item --}}
	<script type="text/javascript">
		$(function(){
		$('#statussirkulasi').DataTable({
			order: [[0, 'asc']],
			processing: true,
			responsive: true,
			serverSide: true,
			'bDestroy': true,
			ajax: '{!! route('operator.pendukung.datatable.statussirkulasi') !!}',
			columns: [
			{data: 'DT_RowIndex', name: 'DT_RowIndex', width: '5px',},
			{data: 'status_sirkulasi_nama', name: 'status_sirkulasi_nama', width: '100px', orderable: true},
			{data: 'action', name: 'action', width: '100px', orderable: false, searchable: false,},
			]
		});
	});
	</script>
@endpush