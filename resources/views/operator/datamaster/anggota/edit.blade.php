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
								<input type="text" class="form-control" name="name" placeholder="Nama Anggota" required="" value="{{$anggota->name}}">
							</div>
							<div class="form-group col-md-6">
							
								<select name="role" id="" class="custom-select">
									<option value="">Pilih Kelas Akun</option>
									<option value="Siswa">Siswa</option>
									<option value="Operator">Operator</option>
								</select>
						
							</div>
						</div>

						<div class="row">
							<div class="form-group col-md-6">
								<select class="form-control" name="jurusan_nama">
									<option>-Pilih Jurusan-</option>
									@foreach( $jurusan as $value => $data )
										@if($anggota->jurusan_id == $data->jurusan_id)
											<option value="{{ $data->jurusan_id }}" selected="">{{ $data->jurusan_nama }}</option>
										@else 
											<option value="{{$data->jurusan_id}}">{{$data->jurusan_nama}}</option>
										@endif
									@endforeach
								</select>
							</div>

							<div class="form-group col-md-6">
								<select class="form-control" name="kelas_nama">
									<option>-Pilih Kelas-</option>
									@foreach( $kelas as $k )
										@if($anggota->kelas_id == $k->kelas_id)
											<option value="{{ $k->kelas_id }}" selected="">{{ $k->kelas_nama }} - {{ $k->jurusan_nama }}</option>
										@else 
											<option value="{{ $k->kelas_id }}">{{ $k->kelas_nama }} - {{ $k->jurusan_nama }}</option>
										@endif
									@endforeach
								</select>
							</div>
						</div>

						<div class="row">
							<div class="form-group col-md-6">
								<input type="email" class="form-control" name="email" placeholder="Pos-el" required="" value="{{$anggota->email}}">
							</div>

							<div class="form-group col-md-6">
								<input type="text" class="form-control" name="password" placeholder="Katasandi" required="" value="{{$anggota->password}}">
							</div>

							<div class="form-group col-md-6">
								<input type="text" class="form-control" name="password2" placeholder="Konfirmasi katasandi" required="" value="{{$anggota->password}}">
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