@extends('layouts.operator.master')
@section('judul')
Anggota - Operator  
@stop

@section('konten')
<div class="col-md-12">
	<div class="tab mt-5">
		<button class="tablinks" id="defaultOpen" onclick="openTabs(event, 'list')">Data Anggota</button>
		<button class="tablinks" onclick="openTabs(event, 'tambah')">Tambah Anggota</button>
	</div>
</div>

<div id="list" class="tabcontent">
	<div class="col-md-12 mt-5">
		<h5 class="text-dark mb-4"><i class="fas fa-user-circle"></i> Data Anggota</h5>

		<div class="table table-responsive">
			<!-- Tabel Anggota -->
			<table id="anggota" class="table table-striped table-bordered">
				<thead>
					<tr>
						<th class="text-center">No</th>
						<th class="text-center">Nama</th>
						<th class="text-center">Jurusan</th>
						<th class="text-center">Kelas</th>
						<th class="text-center">Level</th>
						<th class="text-center">Pos-el</th>
						<th class="text-center">Opsi</th>
					</tr>
				</thead>
			</table>
			<!-- Bagian Akhir Tabel Anggota -->          
		</div>
	</div>
</div>

<div id="tambah" class="tabcontent">
	<div class="row justify-content-center mt-5 mb-5">
		<!-- Form Tambah-Anggota -->
		<div class="col-md-12 mt-3">
			<div class="card shadow">
				<div class="card-body">
					<h5 class="text-dasar"><i class="fas fa-user-circle"></i> Form Tambah Anggota</h5>
					<hr style="margin-bottom: 30px;">
					<form class="form-horizontal" action="{{ route('operator.anggota.store') }}">
						@csrf
						<div class="row">
							<div class="form-group col-md-6">
								<input type="text" class="form-control" name="anggota_nama" placeholder="Nama Anggota" required="">
							</div>
							<div class="form-group col-md-6">
								<select class="form-control" name="anggota_tipe" required="">
									<option>-Pilih Level-</option>
									@foreach( $anggotaTipe as $aT )
										<option value="{{ $aT->anggota_tipe_id }}">{{ $aT->anggota_tipe_nama }}</option>
									@endforeach
								</select>
							</div>
						</div>

						<div class="row">
							<div class="form-group col-md-6">
								<select class="form-control" name="jurusan_nama">
									<option>-Pilih Jurusan-</option>
									@foreach( $jurusan as $j )
										<option value="{{ $j->jurusan_id }}">{{ $j->jurusan_nama }}</option>
									@endforeach
								</select>
							</div>

							<div class="form-group col-md-6">
								<select class="form-control" name="kelas_nama">
									<option>-Pilih Kelas-</option>
									@foreach( $kelas as $k )
										<option value="{{ $k->kelas_id }}">{{ $k->kelas_nama }} - {{ $k->jurusan_nama }}</option>
									@endforeach
								</select>
							</div>
						</div>

						<div class="row">
							<div class="form-group col-md-6">
								<input type="email" class="form-control" name="posel" placeholder="Pos-el" required="">
							</div>

							<div class="form-group col-md-6">
								<input type="password" class="form-control" name="password" placeholder="Katasandi" required="">
							</div>

							<div class="form-group col-md-6">
								<input type="password" class="form-control" name="password2" placeholder="Konfirmasi Katasandi" required="">
							</div>
						</div>

						<div class="form-group mb-5">
							<button type="submit" class="btn btn-success btn-sm float-right"><i class="fas fa-save"></i> Simpan</button>
						</div>

					</form>
				</div>
			</div>
		</div>
		<!-- Bagian Akhir Form Tambah-Anggota -->
	</div>
</div>
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
			{data: 'anggota_tipe_nama', name: 'anggota_tipe_id', width: '30px', orderable: true},
			{data: 'posel', name: 'posel', width: '30px', orderable: true},
			{data: 'action', name: 'action', width: '100px', orderable: false, searchable: false,},
			]
		});
	});
</script>	

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

@endpush