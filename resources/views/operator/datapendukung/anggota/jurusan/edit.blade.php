@extends('layouts.operator.master')

@section('judul')
Tambah Data-Pendukung Anggota (Operator)
@stop

@section('subJudul')
<h3>Ubah Data-Pendukung</h3>
<br /><br />
@stop

@section('konten')
<div class="row">
	<!-- Form Anggota-Tipe -->
	<div class="col-md-12 col-xs-12">
		<div class="x_panel">
			<div class="x_title">
				<h2>Form Jurusan</h2>
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
				<form class="form-horizontal form-label-left input_mask" action="{{ route('operator.store.DataPendukung.jurusan') }}" method="post">
					@csrf

					<div class="form-group">
						<div class="col-md-12 col-sm-12 col-xs-12">
							<input type="text" class="form-control" name="jurusan_nama" value="{{ $jurusan->jurusan_nama }}">
							<input type="hidden" name="jurusan_id" value="{{ $jurusan->jurusan_id }}">
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
	<!-- Bagian Akhir Form Anggota-Tipe -->
</div>
@stop

