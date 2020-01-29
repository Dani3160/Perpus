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
				<h5 class="text-dark">Form Kelas</h5>
				<hr>

				<form class="form-horizontal form-label-left input_mask" action="{{ route('operator.store.DataPendukung.kelas') }}" method="post">
					@csrf

					<div class="form-group">
						<input type="text" class="form-control" name="kelas_nama" value="{{ $kelas->kelas_nama }}">
						<br />
						<select class="form-control" name="jurusan_nama" required="">
							<option selected="" disabled="">-Pilih Jurusan-</option>
							@foreach( $jurusan as $j )
								<option value="{{ $j->jurusan_id }}">{{ $j->jurusan_nama }}</option>
							@endforeach
						</select>
						<input type="hidden" name="kelas_id" value="{{ $kelas->kelas_id }}">
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

