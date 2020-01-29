@extends('layouts.operator.master')

@section('judul', 'Example')

@section('subJudul')
<h3>Ubah-Anggota</h3>
@stop

@section('konten')
<div id="tambah">
	<div class="row justify-content-center mt-5 mb-5">
		<!-- Form Tambah-Anggota -->
		<div class="col-md-12 mt-3">
			<div class="card shadow">
				<div class="card-body">
					<h5 class="text-dasar"><i class="fas fa-user-circle"></i> Form Tambah Anggota</h5>
					<hr style="margin-bottom: 30px;">
					<form class="form-horizontal" action="{{ route('operator.anggota.store') }}">
						@csrf
						<input type="hidden" name="anggota_id" value="{{ $anggota->anggota_id }}">
						<div class="row">
							<div class="form-group col-md-6">
								<input type="text" class="form-control" name="anggota_nama" placeholder="Nama Anggota" required="" value="{{$anggota->anggota_nama}}">
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
								<input type="email" class="form-control" name="posel" placeholder="Pos-el" required="" value="{{$anggota->posel}}">
							</div>

							<div class="form-group col-md-6">
								<input type="text" class="form-control" name="password" placeholder="Katasandi" required="" value="{{$anggota->katasandi}}">
							</div>

							<div class="form-group col-md-6">
								<input type="text" class="form-control" name="password2" placeholder="Konfirmasi Katasandi" required="" value="{{$anggota->katasandi}}">
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