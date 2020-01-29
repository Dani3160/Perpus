@extends('layouts.operator.master')
@section('judul')
	Data Pendukung Anggota - Operator
@stop
@section('konten')

<div class="col-md-12 mt-4">
	<div class="tab mt-5">
		<button class="tablinks" id="defaultOpen" onclick="openTabs(event, 'listpendukung')">Data Pendukung Anggota</button>
		<button class="tablinks" onclick="openTabs(event, 'tambah')">Tambah Pendukung Anggota</button>
	</div>
</div>

<div id="listpendukung" class="tabcontent">
	<div class="row mt-4 mb-5">
		{{-- Tabel Jurusan --}}
		<div class="col-md-6">
			<h5 class="text-dark"><i class="fas fa-file"></i> Data Jurusan</h5>
			<div class="table table-responsive mt-3">
				<table class="table table-bordered table-striped" id="jurusan">
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
		{{-- Bagian Akhir Tabel Jurusan --}}

		{{-- Tabel Kelas --}}
		<div class="col-md-6">
			<h5 class="text-dark"><i class="far fa-clone"></i> Data Kelas</h5>
			<div class="table table-responsive mt-3">
				<table class="table table-bordered table-striped" id="kelas">
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
		{{-- Bagian Akhir Tabel Kelas --}}

		{{-- Tabel Anggota-Tipe --}}
		<div class="col-md-6">
			<h5 class="text-dark"><i class="fas fa-user"></i> Data Anggota Tipe</h5>
			<div class="table table-responsive mt-3">
				<table class="table table-bordered table-striped" id="anggotaTipe">
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
		{{-- Bagian Akhir Tabel Anggota-Tipe --}}
	</div>
</div>

<div id="tambah" class="tabcontent">
	<div class="row mt-4 mb-5">
		<!-- Form Anggota-Tipe -->
		<div class="col-md-6">
			<div class="card shadow">
				<div class="card-body">
					<h5 class="text-dark"><i class="fas fa-user"></i> Form Anggota Tipe</h5>
					<hr>
					<form class="form-horizontal form-label-left input_mask" action="{{ route('operator.store.DataPendukung.tipe') }}" method="post">
						@csrf
						<div class="form-group">
							<input type="text" class="form-control" name="anggota_tipe_nama" placeholder="Masukkan tipe anggota" required="">
						</div>
						<div class="form-group">
							<button type="submit" class="btn btn-success btn-sm float-right"><i class="fas fa-save"></i> Simpan</button>
						</div>
					</form>
				</div>
			</div>
		</div>
		<!-- Bagian Akhir Form Anggota-Tipe -->

		<!-- Form Jurusan -->
		<div class="col-md-6">
			<div class="card shadow">
				<div class="card-body">
					<h5 class="text-dark"><i class="fas fa-file"></i> Form Jurusan</h5>
					<hr>
					<form class="form-horizontal form-label-left input_mask" action="{{ route('operator.store.DataPendukung.jurusan') }}" method="post">
						@csrf

						<div class="form-group">
							<input type="text" class="form-control" name="jurusan_nama" placeholder="Masukkan nama jurusan" required="">
						</div>

						<div class="form-group">
							<button type="submit" class="btn btn-success btn-sm float-right"><i class="fas fa-save"></i> Simpan</button>
						</div>

					</form>
				</div>
			</div>
		</div>
		<!-- Bagian Akhir Form Jurusan -->

		<!-- Form Kelas -->
		<div class="col-md-6 mt-3">
			<div class="card shadow">
				<div class="card-body">
					<h5 class="text-dark"><i class="far fa-clone"></i> Form Kelas</h5>
					<hr>
					<form class="form-horizontal form-label-left input_mask" action="{{ route('operator.store.DataPendukung.kelas') }}" method="post">
						@csrf

						<div class="form-group">
							<input type="text" class="form-control" name="kelas_nama" placeholder="Masukkan nama kelas" required="">
						</div>

						<div class="form-group">
							<select class="custom-select" name="jurusan_nama" required="">
								<option>-Pilih Jurusan-</option>
								@foreach( $jurusan as $j )
									<option value="{{ $j->jurusan_id }}">{{ $j->jurusan_nama }}</option>
								@endforeach
							</select>
						</div>
						<div class="form-group">
							<button type="submit" class="btn btn-success btn-sm float-right"><i class="fas fa-save"></i> Simpan</button>
						</div>

					</form>
				</div>
			</div>
		</div>
		<!-- Bagian Akhir Form Kelas -->
	</div>
</div>
@stop


@push('scripts')
<script type="text/javascript">
	function openTabs(evt, cityName) {
	var i, tabcontent, tablinks;
	tabcontent = document.getElementsByClassName("tabcontent");
	
	for (i = 0; i < tabcontent.length; i++) {
		tabcontent[i].style.display = "none";
	}

	tablinks = document.getElementsByClassName("tablinks");

	for (i = 0; i < tablinks.length; i++) {
		tablinks[i].className = tablinks[i].className.replace(" active", "");
	}
		document.getElementById(cityName).style.display = "block";
		evt.currentTarget.className += " active";
	}
	// Get the element with id="defaultOpen" and click on it
	document.getElementById("defaultOpen").click();
</script>
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