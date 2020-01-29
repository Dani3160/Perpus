@extends('layouts.operator.master')
@section('judul')
	Data Pendukung Biblio - Operator
@stop

@section('konten')

<div class="col-md-12">
	<div class="tab mt-5">
		<button class="tablinks" id="defaultOpen" onclick="openTabs(event, 'daftarpendukung')">Daftar Pendukung</button>
		<button class="tablinks" onclick="openTabs(event, 'tambahpendukung')">Tambah Pendukung</button>
		<button class="tablinks" onclick="openTabs(event, 'riwayat')">Riwayat</button>
	</div>
</div>

<div class="col-md-12 mt-3 mb-3">
	@if ($message = Session::get('success'))
	<div class="toast" data-autohide="false">
		<div class="toast-header">
			<strong class="mr-auto text-primary">Sukses</strong>
			<small class="text-muted">Baru saja</small>
			<button type="button" class="ml-2 mb-1 close" data-dismiss="toast">&times;</button>
		</div>
		<div class="toast-body">
			<strong class="text-success">{{$message}}</strong>
		</div>
	</div>
      <!-- <div class="alert alert-success alert-block">
        <button type="button" class="close" data-dismiss="alert">×</button> 
          <strong>{{ $message }}</strong>
      </div> -->
    @endif

	@if ($message = Session::get('error'))
		<div class="alert alert-danger alert-block">
		<button type="button" class="close" data-dismiss="alert">×</button> 
		<strong>{{ $message }}</strong>
		</div>
	@endif
</div>

<div id="daftarpendukung" class="tabcontent mb-4">
	<div class="row">
		{{-- Tabel Penulis --}}
			<div class="col-md-6 mt-3">
				<h6 class="text-dark mb-3"><i class="fas fa-pen-square"></i> Data Penulis</h6>
			    
			    <div class="table table-responsive">
			      <table class="table table-bordered table-striped" id="penulis">
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
		{{-- Bagian Akhir Tabel Penulis --}}

		{{-- Tabel Penerbit --}}
			<div class="col-md-6 mt-3">
				<h6 class="text-dark mb-3"><i class="fas fa-user-circle"></i> Data Penerbit</h6>
			    <div class="table table-responsive">
			      <table class="table table-bordered table-striped" id="penerbit">
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
		{{-- Bagian Akhir Tabel Penerbit --}}
	</div>
	<div class="row mt-3">
		{{-- Tabel klasifikasi --}}
			<div class="col-md-6 mt-3">
			    
			    <h6 class="text-dark mb-3"><i class="fas fa-calendar check"></i> Data Klasifikasi</h6>
			    <div class="table table-responsive">
			      <table class="table table-bordered table-striped" id="klasifikasi">
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
		{{-- Bagian Akhir Tabel klasifikasi --}}

		{{-- Tabel Status Item --}}
			<div class="col-md-6 mt-3">
			  
			    <h6 class="text-dark mb-3"><i class="fas fa-calendar-alt"></i> Data Status Item</h6>
			    <div class="table table-responsive">
			      <table class="table table-bordered table-striped" id="statusitem">
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
		{{-- Bagian Akhir Tabel Status Item --}}
	</div>
	<div class="row mt-3">
		{{-- Tabel Sumber Item --}}
		<div class="col-md-6 mt-3">
			<h6 class="text-dark mb-3"><i class="fas fa-check-square"></i> Data Sumber Item</h6>
			<div class="table table-responsive">
				<table class="table table-bordered table-striped" id="sumberitem">
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
		{{-- Bagian Akhir Tabel Sumber Item --}}

		{{-- Tabel TipeKoleksi --}}
		<div class="col-md-6 mt-3">	    
			<h6 class="text-dark mb-3"><i class="far fa-clipboard"></i> Data Tipe Koleksi</h6>
			<div class="table table-responsive">
				<table class="table table-bordered table-striped" id="tipekoleksi">
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
		{{-- Bagian Akhir Tabel TipeKoleksi --}}

		{{-- Tabel status sirkulasi --}}
		<div class="col-md-6">
			<h6 class="text-dark mb-3"><i class="far fa-clone"></i> Data Status Sirkulasi</h6>
			<div class="table table-responsive">
				<table class="table table-bordered table-striped" id="statussirkulasi">
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
		{{-- Bagian Akhir Tabel status sirkulasi --}}
	</div>
</div>

<div id="tambahpendukung" class="tabcontent">
	<div class="row">
		{{-- Tabel Penulis --}}
			<div class="col-md-6 mt-3">
			  <div class="card shadow">
			    <div class="card-body">
			      <h6 class="text-dark"><i class="fas fa-pen-square"></i> Tambah Penulis</h6>
				  <hr>
					<form action="{{ route('operator.pendukung.biblio.penulis.proses') }}" method="POST">
						@csrf
						<div class="form-group">
							<label for="penulis_nama">Nama Penulis*</label>
							<input type="text" name="penulis_nama" class="form-control" value="{{ old('penulis_nama') }}" autocomplete="off" placeholder="Masukkan nama penulis..." required>
						</div>	
						<button type="submit" class="btn btn-success btn-sm float-right"><i class="fas fa-save"></i> Simpan</button>
					</form>
			  	</div>
			  </div>
			</div>
		{{-- Bagian Akhir Tabel Penulis --}}

		{{-- Tabel penerbit --}}
			<div class="col-md-6 mt-3">
			  <div class="card shadow">
			    <div class="card-body">
			      <h6 class="text-dark"><i class="fas fa-user-circle"></i> Tambah Penerbit</h6>
				  <hr>
				  	<form action="{{ route('operator.pendukung.biblio.penerbit.proses') }}" method="POST">
                    	@csrf
                    	<div class="form-group">
                    		<label for="penerbit_nama">Nama Penerbit*</label>
                    		<input type="text" name="penerbit_nama" class="form-control" value="{{ old('penerbit_nama') }}" autocomplete="off" placeholder="Masukkan nama penerbit..." required>
                    	</div>	
                    	<button type="submit" class="btn btn-success btn-sm float-right"><i class="fas fa-save"></i> Simpan</button>
                    </form>
			    </div>
			  </div>
			</div>
		{{-- Bagian Akhir Tabel Penerbit --}}
	</div>
	<div class="row">
		{{-- Tabel klasifikasi --}}
			<div class="col-md-6 mt-3">
			  <div class="card shadow">
			    <div class="card-body">
			      <h6 class="text-dark"><i class="fas fa-calendar-check"></i> Tambah Klasifikasi</h6>
				  <hr>
				  	<form action="{{ route('operator.pendukung.biblio.klasifikasi.proses') }}" method="POST">
                    	@csrf
                    	<div class="form-group">
                    		<label for="klasifikasi_nama">Nama klasifikasi*</label>
                    		<input type="text" name="klasifikasi_nama" class="form-control" value="{{ old('klasifikasi_nama') }}" autocomplete="off" placeholder="Masukkan nama klasifikasi..." required>
                    	</div>	
                    	<button type="submit" class="btn btn-success btn-sm float-right"><i class="fas fa-save"></i> Simpan</button>
                    </form>
			    </div>
			  </div>
			</div>
		{{-- Bagian Akhir Tabel klasifikasi --}}

		{{-- Tabel tipekoleksi --}}
			<div class="col-md-6 mt-3">
			  <div class="card shadow">
			    <div class="card-body">
			      <h6 class="text-dark"><i class="far fa-clipboard"></i> Tambah Tipe Koleksi</h6>
				  <hr>
				  	<form action="{{ route('operator.pendukung.biblio.tipekoleksi.proses') }}" method="POST">
                    	@csrf
                    	<div class="form-group">
                    		<label for="tipekoleksi_nama">Nama tipekoleksi*</label>
                    		<input type="text" name="tipekoleksi_nama" class="form-control" value="{{ old('tipekoleksi_nama') }}" autocomplete="off" placeholder="Masukkan tipekoleksi..." required>
                    	</div>	
                    	<button type="submit" class="btn btn-success btn-sm float-right"><i class="fas fa-save"></i> Simpan</button>
                    </form>
			    </div>
			  </div>
			</div>
		{{-- Bagian Akhir Tabel tipekoleksi --}}
	</div>
	<div class="row mb-4">
		{{-- Tabel sumber item --}}
			<div class="col-md-6 mt-3">
			  <div class="card shadow">
			    <div class="card-body">
			      <h6 class="text-dark"><i class="fas fa-check-square"></i> Tambah Sumber Item</h6>
				  <hr>
				  	<form action="{{ route('operator.pendukung.biblio.sumberitem.proses') }}" method="POST">
                    	@csrf
                    	<div class="form-group">
                    		<label for="sumber_item_nama">Sumber Item Buku*</label>
                    		<input type="text" name="sumber_item_nama" class="form-control" value="{{ old('sumber_item_nama') }}" autocomplete="off" placeholder="Masukkan sumber item buku..." required>
                    	</div>	
                    	<button type="submit" class="btn btn-success btn-sm float-right"><i class="fas fa-save"></i> Simpan</button>
                    </form>
			    </div>
			  </div>
			</div>
		{{-- Bagian Akhir Tabel sumber item --}}

		{{-- Tabel Status Item --}}
			<div class="col-md-6 mt-3">
			  <div class="card shadow">
			    <div class="card-body">
			      <h6 class="text-dark"><i class="fas fa-calendar-alt"></i> Tambah Status Item</h6>
			      <hr>
				  	<form action="{{ route('operator.pendukung.biblio.statusitem.proses') }}" method="POST">
                    	@csrf
                    	<div class="form-group">
                    		<label for="status_item_nama">Status Item Buku*</label>
                    		<input type="text" name="status_item_nama" class="form-control" value="{{ old('status_item_nama') }}" autocomplete="off" placeholder="Masukkan status item..." required>
                    	</div>	
                    	<button type="submit" class="btn btn-success btn-sm float-right"><i class="fas fa-save"></i> Simpan</button>
                    </form>
			    </div>
			  </div>
			</div>
		{{-- Bagian Akhir Tabel Status Item --}}

		{{-- Tabel Status Sirkulasi --}}
			<div class="col-md-6 mt-3">
			  <div class="card shadow">
			    <div class="card-body">
			      <h6 class="text-dark"><i class="far fa-clone"></i> Tambah Status Sirkulasi</h6>
				  <hr>
				  	<form action="{{ route('operator.pendukung.biblio.statussirkulasi.proses') }}" method="POST">
                    	@csrf
                    	<div class="form-group">
                    		<label for="status_item_nama">Status Sirkulasi*</label>
                    		<input type="text" name="status_sirkulasi_nama" class="form-control" value="{{ old('status_sirkulasi_nama') }}" autocomplete="off" placeholder="Masukkan status sirkulasi..." required>
                    	</div>	
                    	<button type="submit" class="btn btn-success btn-sm float-right"><i class="fas fa-save"></i> Simpan</button>
                    </form>
			    </div>
			  </div>
			</div>
		{{-- Bagian Akhir Tabel Status Item --}}
	</div>
</div>

<div id="riwayat" class="tabcontent">
	<div class="row mt-3 mb-4">
		{{-- Tabel Penulis --}}
			<div class="col-md-6">
			    <h6 class="text-dark"><i class="fas fa-pen-square"></i> Data Penulis</h6>
				<div class="table table-responsive">
					<table class="table table-bordered table-striped" id="penulisriwayat">
						<thead>
						<tr>
							<th>No</th>
							<th>Nama Penulis</th>
							<th>Terhapus</th>
						</tr>
						</thead>
					</table>
				</div>
			</div>
		{{-- Bagian Akhir Tabel Penulis --}}

		{{-- Tabel Penerbit --}}
			<div class="col-md-6">
			  
			    <h6 class="text-dark"><i class="fas fa-user-circle"></i> Data Penerbit</h6>
			    
			    <div class="table table-responsive">

			      <table class="table table-bordered table-striped" id="penerbitriwayat">
			        <thead>
			          <tr>
			            <th>No</th>
			            <th>Nama Penerbit</th>
			            <th>Terhapus</th>
			          </tr>
			        </thead>
			      </table>

			    </div>
			  
			</div>
		{{-- Bagian Akhir Tabel Penerbit --}}
	</div>

	<div class="row mt-3 mb-4">
		{{-- Tabel klasifikasi --}}
			<div class="col-md-6">
			  
			    <h6 class="text-dark"><i class="fas fa-calendar-check"></i> Data Klasifikasi</h6>
			
			    <div class="table table-responsive">
			      <table class="table table-bordered table-striped" id="klasifikasiriwayat">
			        <thead>
			          <tr>
			            <th>No</th>
			            <th>Klasifikasi</th>
			            <th>Terhapus</th>
			          </tr>
			        </thead>
			      </table>
			    </div>
			</div>
			
		{{-- Bagian Akhir Tabel klasifikasi --}}

		{{-- Tabel Status Item --}}
			<div class="col-md-6">
			  
			    <h6 class="text-dark"><i class="fas fa-calendar-alt"></i> Data Status Item</h6>
			    <div class="table table-responsive">
			      <table class="table table-bordered table-striped" id="statusitemriwayat">
			        <thead>
			          <tr>
			            <th>No</th>
			            <th>Status Item</th>
			            <th>Terhapus</th>
			          </tr>
			        </thead>
			      </table>
			    </div>
			</div>
			
		{{-- Bagian Akhir Tabel Status Item --}}
	</div>

	<div class="row mt-3">
		{{-- Tabel Sumber Item --}}
			<div class="col-md-6">
			    <h6 class="text-dark"><i class="fas fa-check-square"></i> Data Sumber Item</h6>
			    <div class="table table-responsive">
			      <table class="table table-bordered table-striped" id="sumberitemriwayat">
			        <thead>
			          <tr>
			            <th>No</th>
			            <th>Sumber Item</th>
			            <th>Terhapus</th>
			          </tr>
			        </thead>
			      </table>
			    </div>
			</div>
			
		{{-- Bagian Akhir Tabel Sumber Item --}}

		{{-- Tabel TipeKoleksi --}}
			<div class="col-md-6">
			    <h6 class="text-dark"><i class="far fa-clipboard"></i> Data Tipe Koleksi</h6>
			    <div class="table table-responsive">
			      <table class="table table-bordered table-striped" id="tipekoleksiriwayat">
			        <thead>
			          <tr>
			            <th>No</th>
			            <th>Tipe Koleksi</th>
			            <th>Terhapus</th>
			          </tr>
			        </thead>
			      </table>
			    </div>
			</div>
		{{-- Bagian Akhir Tabel TipeKoleksi --}}

		{{-- Tabel status sirkulasi --}}
			<div class="col-md-6">		  
			    <h6 class="text-dark"><i class="far fa-clone"></i> Data Status Sirkulasi</h6>
			    <div class="table table-responsive">
			      <table class="table table-bordered table-striped" id="statussirkulasiriwayat">
			        <thead>
			          <tr>
			            <th>No</th>
			            <th>Status Sirkulasi</th>
			            <th>Terhapus</th>
			          </tr>
			        </thead>
			      </table>
			    </div>
			</div>
		{{-- Bagian Akhir Tabel status sirkulasi --}}
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


<script>
$(document).ready(function(){
    $('.toast').toast('show', 1500);
});
</script>

@endpush
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
@push('scripts')
{{-- Tabel penulis --}}
	<script type="text/javascript">
		$(function(){
		$('#penulisriwayat').DataTable({
			order: [[0, 'asc']],
			processing: true,
			responsive: true,
			serverSide: true,
			'bDestroy': true,
			ajax: '{!! route('operator.pendukung.biblio.penulis.datatables.riwayat') !!}',
			columns: [
			{data: 'DT_RowIndex', name: 'DT_RowIndex', width: '5px',},
			{data: 'penulis_nama', name: 'penulis_nama', width: '100px', orderable: true},
			{data: 'perubahan', name: 'perubahan', width: '100px', orderable: true},
			]
		});
	});
	</script>
{{-- Tabel Penerbit --}}
	<script type="text/javascript">
		$(function(){
		$('#penerbitriwayat').DataTable({
			order: [[0, 'asc']],
			processing: true,
			responsive: true,
			serverSide: true,
			'bDestroy': true,
			ajax: '{!! route('operator.pendukung.biblio.penerbit.datatables.riwayat') !!}',
			columns: [
			{data: 'DT_RowIndex', name: 'DT_RowIndex', width: '5px',},
			{data: 'penerbit_nama', name: 'penerbit_nama', width: '100px', orderable: true},
			{data: 'perubahan', name: 'perubahan', width: '75px', orderable: true},
			]
		});
	});
	</script>
{{-- Tabel Status Item --}}
	<script type="text/javascript">
		$(function(){
		$('#statusitemriwayat').DataTable({
			order: [[0, 'asc']],
			processing: true,
			responsive: true,
			serverSide: true,
			'bDestroy': true,
			ajax: '{!! route('operator.pendukung.biblio.statusitem.datatables.riwayat') !!}',
			columns: [
			{data: 'DT_RowIndex', name: 'DT_RowIndex', width: '5px',},
			{data: 'status_item_nama', name: 'status_item_nama', width: '100px', orderable: true},
			{data: 'perubahan', name: 'perubahan', width: '100px', orderable: false, searchable: false,},
			]
		});
	});
	</script>
{{-- Tabel Sumber Item --}}
	<script type="text/javascript">
		$(function(){
		$('#sumberitemriwayat').DataTable({
			order: [[0, 'asc']],
			processing: true,
			responsive: true,
			serverSide: true,
			'bDestroy': true,
			ajax: '{!! route('operator.pendukung.biblio.sumberitem.datatables.riwayat') !!}',
			columns: [
			{data: 'DT_RowIndex', name: 'DT_RowIndex', width: '5px',},
			{data: 'sumber_item_nama', name: 'sumber_item_nama', width: '100px', orderable: true},
			{data: 'perubahan', name: 'perubahan', width: '100px', orderable: true},
			]
		});
	});
	</script>
{{-- Tabel TipeKoleksi --}}
	<script type="text/javascript">
		$(function(){
		$('#tipekoleksiriwayat').DataTable({
			order: [[0, 'asc']],
			processing: true,
			responsive: true,
			serverSide: true,
			'bDestroy': true,
				ajax: '{!! route('operator.pendukung.biblio.tipekoleksi.datatables.riwayat') !!}',
			columns: [
			{data: 'DT_RowIndex', name: 'DT_RowIndex', width: '5px',},
			{data: 'tipekoleksi_nama', name: 'tipekoleksi_nama', width: '100px', orderable: true},
			{data: 'perubahan', name: 'perubahan', width: '100px', orderable: false, searchable: false,},
			]
		});
	});
	</script>
{{-- Tabel Status Item --}}
	<script type="text/javascript">
		$(function(){
		$('#klasifikasiriwayat').DataTable({
			order: [[0, 'asc']],
			processing: true,
			responsive: true,
			serverSide: true,
			'bDestroy': true,
			ajax: '{!! route('operator.pendukung.biblio.klasifikasi.datatables.riwayat') !!}',
			columns: [
			{data: 'DT_RowIndex', name: 'DT_RowIndex', width: '5px',},
			{data: 'klasifikasi_nama', name: 'klasifikasi_nama', width: '100px', orderable: true},
			{data: 'perubahan', name: 'perubahan', width: '100px', orderable: false, searchable: false,},
			]
		});
	});
	</script>
{{-- Tabel Status Item --}}
	<script type="text/javascript">
		$(function(){
		$('#statussirkulasiriwayat').DataTable({
			order: [[0, 'asc']],
			processing: true,
			responsive: true,
			serverSide: true,
			'bDestroy': true,
			ajax: '{!! route('operator.pendukung.biblio.statussirkulasi.datatables.riwayat') !!}',
			columns: [
			{data: 'DT_RowIndex', name: 'DT_RowIndex', width: '5px',},
			{data: 'status_sirkulasi_nama', name: 'status_sirkulasi_nama', width: '100px', orderable: true},
			{data: 'perubahan', name: 'perubahan', width: '100px', orderable: false, searchable: false,},
			]
		});
	});
	</script>
@endpush