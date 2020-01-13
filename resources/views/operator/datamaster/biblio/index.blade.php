@extends('layouts.operator.master')
@section('judul')
Biblio - Operator  
@stop

@section('konten')
{{-- Area Konten --}}
<div class="col-md-12 col-sm-12 col-xs-12">

	<div class="tab mt-5">
		<button class="tablinks" id="defaultOpen" onclick="openTabs(event, 'list-tabel')">Data Biblio</button>
		<button class="tablinks" onclick="openTabs(event, 'tambah')">Tambah Biblio</button>
		<button class="tablinks" onclick="openTabs(event, 'riwayat')">Riwayat</button>
	</div>
		<!-- Tampil Biblio -->
		<div id="list-tabel" class="tabcontent">
			<div class="col-md-12">
				<div class="row">
					<div class="col-md-9">
						<h3 class="mt-4"><i class="fas fa-book"></i> Data Biblio</h3>
					</div>
					<div class="col-md-3">
						<a href="{{route('operator.biblio.export')}}" class="btn btn-success btn-sm float-right mt-4"><i class="fas fa-download"></i> Export Data</a>
					</div>
					
				</div>
			</div>
			
  			<!-- Tabel Biblio -->
			<div class="table table-responsive">
				<table id="biblio" class="table table-striped table-bordered table-responsive">
					<thead>
						<tr>
							<th>No</th>
							<th>Judul</th>
							<th>Edisi</th>
							<th>ISBN</th>
							<th>Eksemplar</th>
							<th>Status</th>
							<th>Pembuatan</th>
							<th>Perubahan</th>
							<th>Opsi</th>
						</tr>
					</thead>
				</table>
			</div>
			<!-- Bagian Akhir Tabel Biblio -->          
		</div>
		<!-- Akhir Tampil Biblio -->

		<!-- Tambah Biblio -->
		<div id="tambah" class="tabcontent">
			<div class="col-md-12">
				<div class="card shadow mt-5 mb-5">
					<div class="card-body">
						<h4 class="text-dark mb-3"><i class="fas fa-plus-circle"></i> Tambah Biblio</h4>
						<hr>
						<form action="{{ route('operator.biblio.kirim') }}" method="POST" class="form-horizontal form-label-left input_mask" enctype="multipart/form-data">
							@csrf
							<div class="col-md-12">
								<div class="row">
									<div class="col-md-4 form-group">
										<label for="judul">Judul*</label>
										<input type="text" name="judul" class="form-control" placeholder="Judul Buku" autocomplete="off" value="{{ old('judul') }}">
									</div>
									<div class="col-md-4 form-group">
										<label for="edisi">Edisi*</label>
										<input type="text" name="edisi" class="form-control" placeholder="Edisi Buku" autocomplete="off" value="{{ old('edisi') }}">
									</div>
									<div class="col-md-4 form-group">
										<label for="penerbit_tempat">Tempat Terbit Buku*</label>
										<input type="text" name="penerbit_tempat" class="form-control" autocomplete="off" value="{{ old('penerbit_tempat') }}">
									</div>
								</div>
							</div>
							<div class="col-md-12">
								<div class="row">
									<div class="col-md-4 form-group">
										<label for="penulis_id">Penulis*</label>
										<input type="text" name="penulis_id" class="form-control" id="penulis_id" autocomplete="off" placeholder="Cari Penulis">
									</div>
									<div class="col-md-4 form-group">
										<label for="isbn">ISBN*</label>
										<input type="text" name="isbn" class="form-control" id="isbn" placeholder="ISBN" autocomplete="off" value="{{ old('isbn') }}">
									</div>
									<div class="col-md-4 form-group">
										<label for="penerbit_id">Penerbit*</label>
										<input type="text" name="penerbit_id" class="form-control" id="penerbit_id" autocomplete="off" placeholder="Cari Penerbit">
									</div>
								</div>
							</div>
							<div class="col-md-12">
								<div class="row">
									<div class="col-md-4 form-group">
										<label for="harga_buku">Harga Buku*</label>
										<input type="text" name="harga_buku" class="form-control harga" id="harga_buku" autocomplete="off" value="{{ old('harga') }}">
									</div>
									<div class="col-md-4 form-group">
										<label for="penerbit_tahun">Tahun Terbit Buku*</label>
										<input type="text" name="penerbit_tahun" class="form-control" id="penerbit_tahun" autocomplete="off" value="{{ old('penerbit_tahun') }}">
									</div>
									<div class="col-md-4 form-group">
										<label for="penerbit_tahun">Tahun Terbit Buku*</label>
										<input type="text" name="penerbit_tahun" class="form-control" id="penerbit_tahun" autocomplete="off" value="{{ old('penerbit_tahun') }}">
									</div>
								</div>
							</div>
							<div class="col-md-12">
								<div class="row">
									<div class="col-md-4 form-group">
										<label for="deskripsi">Deskripsi*</label>
										<textarea name="deskripsi" class="form-control" rows="3" placeholder="Isi secara singkat..." id="deskripsi">{{ old('deskripsi') }}</textarea>
									</div>
									<div class="col-md-4 form-group">
										<label for="tipekoleksi_id">Tipe Koleksi*</label>
										<select name="tipekoleksi_id" class="form-control">
											<option value="">--Silahkan Pilih--</option>}
											@foreach($tipekoleksi as $tipekoleksis)
											<option value="{{ $tipekoleksis->tipekoleksi_id }}">{{ $tipekoleksis->tipekoleksi_nama }}</option>
											@endforeach
										</select>
									</div>
									<div class="col-md-4 form-group">
										<label for="klasifikasi_id">Klasifikasi*</label>
										<select name="klasifikasi_id" class="form-control">
											<option value="">--Silahkan Pilih--</option>}
											@foreach($klasifikasi as $klasifikasis)
											<option value="{{ $klasifikasis->klasifikasi_id }}">{{ $klasifikasis->klasifikasi_nama }}</option>
											@endforeach
										</select>
									</div>
								</div>
							</div>
							<div class="col-md-12">
								<div class="row">
									<div class="col-md-4 form-group">
										<label for="panggil">Panggil Rak Buku*</label>
										<input type="text" name="panggil" class="form-control" id="panggil" autocomplete="off" value="{{ old('panggil') }}">
									</div>
									<div class="col-md-4 form-group">
										<label for="tingkat">Tingkatan Rak Buku*</label>
										<input type="number" name="tingkatan" class="form-control" id="tingkatan" autocomplete="off" value="{{ old('tingkatan') }}">
									</div>
									<div class="col-md-4 form-group">
										<label for="urutan">Urutan Buku*</label>
										<input type="number" name="urutan" class="form-control" id="urutan" autocomplete="off" value="{{ old('urutan') }}">
									</div>
								</div>
							</div>
							<div class="col-md-12">
								<div class="row">
									<div class="col-md-4 form-group">
										<label for="lampiran">Lampiran Buku*</label>
										<input type="file" name="lampiran" class="form-control" id="lampiran">
									</div>

									<div class="col-md-4 form-group">
										<label>Status Buku*</label>
										<select name="status_item_id" class="form-control">
											<option value="">--Silahkan Pilih--</option>
											@foreach($statusitem as $sim)
											<option value="{{ $sim->status_item_id }}">{{ $sim->status_item_nama }}</option>
											@endforeach
										</select>
									</div>
									<div class="col-md-4 form-group">
										<label for="gambar">Gambar Buku*</label>
										<input type="file" name="gambar" class="form-control" id="gambar" required=""> 
									</div>
								</div>
							</div>
							<div class="col-md-12">
								<div class="row">
									<div class="col-md-4 form-group">
										<label for="sumber_item_id">Sumber Buku*</label>
										<input type="text" name="sumber_item_id" id="sumber_item_id" class="form-control" autocomplete="off">
									</div>
									<div class="col-md-4 form-group">
										<label>
											<input type="checkbox" name="publik" value="1"> Publik
										</label>
									</div>

									<div class="col-md-4 form-group">
										<label>
											<input type="checkbox" name="promosi" value="1"> Promosi
										</label>
									</div>
								</div>
							</div>
								
							<div class="col-md-12">
								<div class="row">
									<div class="col-md-6">
										<input type="number" name="buku_tersedia" class="form-control" autocomplete="off" placeholder="Masukan Jumlah Buku yang Tersedia">
									</div>
									<div class="col-md-6">
										<button type="submit" class="btn btn-primary mb-5">Simpan</button>
									</div>
									
								</div>
							</div>
								
						</form>
					</div>
				</div>	
			</div>
		</div>
		<!-- End Tambah Biblio -->

		<!-- Riwayat Biblio -->
		<div id="riwayat" class="tabcontent">
			<h3 class="mt-4">Riwayat Biblio</h3>
					
				<div class="table table-responsive">
					<div class="col-md-12">
						<div class="row">
					<!-- Tabel Biblio -->
						<table id="biblio_riwayat" class="table table-striped table-bordered dt-row">
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
				
		</div>	
		<!-- Akhir Riwayat Biblio -->
		
		
</div>
{{-- Batas Akhir Area Konten --}}
@stop
@push('scripts')
<script type="text/javascript">
	$(function(){
		$('#biblio').DataTable({
			order: [[0, 'asc']],
			processing: true,
			responsive: true,
			serverSide: true,
			'bDestroy': true,
			ajax: '{!! route('operator.biblio.datatable') !!}',
			columns: [
			{data: 'DT_RowIndex', name: 'DT_RowIndex', width: '5px',},
			{data: 'judul', name: 'judul', width: '100px', orderable: true},
			{data: 'edisi', name: 'edisi', width: '3px', orderable: true},
			{data: 'isbn', name: 'isbn', width: '100px', orderable: true},
			{data: 'eksemplar', name: 'eksemplar', width: '20px', orderable: true},
			{data: 'status_item_nama', name: 'status_item_id', width: '40px', orderable: true},
			{data: 'pembuatan', name: 'pembuatan', width: '100px', orderable: true},
			{data: 'perubahan', name: 'perubahan', width: '100px', orderable: true},
			{data: 'action', name: 'action', width: '150px', orderable: false, searchable: false,},
			]
		});
	});
</script>	
@endpush
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
			{data: 'DT_RowIndex', name: 'DT_RowIndex', width: '100px',},
			{data: 'judul', name: 'judul', width: '300px', orderable: true},
			{data: 'edisi', name: 'edisi', width: '100px', orderable: true},
			{data: 'isbn', name: 'isbn', width: '100px', orderable: true},
			{data: 'eksemplar', name: 'eksemplar', width: '100px', orderable: true},
			{data: 'status_item_nama', name: 'status_item_id', width: '100px', orderable: true},
			{data: 'perubahan', name: 'perubahan', width: '100px', orderable: true},
			]
		});
	});
</script>	
@endpush
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
@endpush