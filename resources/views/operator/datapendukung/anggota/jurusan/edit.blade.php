@extends('layouts.operator.master')

@section('judul')
Tambah Data-Pendukung Anggota (Operator)
@stop

@section('subJudul')
<h3>Ubah Data-Pendukung</h3>
<br /><br />
@stop

@section('konten')
<div class="row justify-content-center mt-5">
	<!-- Form Anggota-Tipe -->
	<div class="col-md-6 mt-5">
		<div class="card shadow mt-5">
			<div class="card-body">
				<h5><i class="fas fa-file"></i> Form Jurusan</h5>
				<hr>
				<form class="form-horizontal form-label-left input_mask" action="{{ route('operator.store.DataPendukung.jurusan') }}" method="post">
					@csrf
					<div class="form-group">
						<input type="text" class="form-control" name="jurusan_nama" value="{{ $jurusan->jurusan_nama }}">
						<input type="hidden" name="jurusan_id" value="{{ $jurusan->jurusan_id }}">
					</div>
					<div class="form-group">
						<button type="submit" class="btn btn-success float-right btn-sm"><i class="fas fa-save"></i> Simpan</button>
					</div>

				</form>
			</div>
		</div>
	</div>
	<!-- Bagian Akhir Form Anggota-Tipe -->
</div>
@stop

