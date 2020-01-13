@extends('layouts.operator.master')

@section('judul', 'Example')

@section('subJudul')
<h3>Tambah-Anggota</h3>
<br /><br />
@stop

@section('konten')
<div class="row">
	<!-- Form Tambah-Anggota -->
	<div class="col-md-8 col-xs-12 col-md-offset-2">
		<div class="x_panel">
			<div class="x_title">
				<h2>Form Anggota -Tipe</h2>
				<ul class="nav navbar-right panel_toolbox">
					<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
					</li>
					<li><a class="close-link"><i class="fa fa-close"></i></a>
					</li>
				</ul>
				<div class="clearfix"></div>
			</div>
			<div class="x_content">
				<br />
				<form class="form-horizontal form-label-left input_mask" action="{{ route('operator.anggota.store') }}">
					@csrf

					<div class="form-group">
						<div class="col-md-12 col-sm-12 col-xs-12">
							<input type="text" class="form-control" name="anggota_nama" placeholder="Nama Anggota" required="">
						</div>
					</div><br />

					<div class="form-group">
						<div class="col-md-12 col-sm-12 col-xs-12">
							<select class="form-control" name="anggota_tipe" required="">
								<option>-Pilih Level-</option>
								@foreach( $anggotaTipe as $aT )
									<option value="{{ $aT->anggota_tipe_id }}">{{ $aT->anggota_tipe_nama }}</option>
								@endforeach
							</select>
						</div>
					</div><br />

					<div class="form-group">
						<div class="col-md-12 col-sm-12 col-xs-12">
							<select class="form-control" name="jurusan_nama" required="">
								<option>-Pilih Jurusan-</option>
								@foreach( $jurusan as $j )
									<option value="{{ $j->jurusan_id }}">{{ $j->jurusan_nama }}</option>
								@endforeach
							</select>
						</div>
					</div><br />

					<div class="form-group">
						<div class="col-md-12 col-sm-12 col-xs-12">
							<select class="form-control" name="kelas_nama" required="">
								<option>-Pilih Kelas-</option>
								@foreach( $kelas as $k )
									<option value="{{ $k->kelas_id }}">{{ $k->kelas_nama }} - {{ $k->jurusan_nama }}</option>
								@endforeach
							</select>
						</div>
					</div><br />

					<div class="form-group">
						<div class="col-md-12 col-sm-12 col-xs-12">
							<input type="email" class="form-control" name="posel" placeholder="Pos-el" required="">
						</div>
					</div><br />

					<div class="form-group">
						<div class="col-md-12 col-sm-12 col-xs-12">
							<input type="password" class="form-control" name="password" placeholder="Katasandi" required="">
						</div>
					</div><br />

					<div class="form-group">
						<div class="col-md-12 col-sm-12 col-xs-12">
							<input type="password" class="form-control" name="password2" placeholder="Konfirmasi Katasandi" required="">
						</div>
					</div>


					<div class="ln_solid"></div>
					<div class="form-group">
						<div class="col-md-12 col-sm-12 col-xs-12 ">
							<button type="submit" class="btn btn-success form-control">Submit</button>
						</div>
					</div>

				</form>
			</div>
		</div>
	</div>
	<!-- Bagian Akhir Form Tambah-Anggota -->
</div>
@stop