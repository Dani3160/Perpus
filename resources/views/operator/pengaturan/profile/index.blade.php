@extends('layouts.admin.master')

@section('judul', 'Profile')

@section('subJudul')
<h3>Halaman Profile</h3>
@stop

@section('konten')
<div class="row"> <!-- Start Row1 -->
	<div class="col-md-12 col-sm-12 col-xs-12">
		<div class="x_panel"> <!-- Star X_panel -->
			<div class="x_content"> <!-- Star X_content -->

				<div class="col-md-3 col-sm-3 col-xs-12 profile_left">
					<div class="profile_img">
						<div id="crop-avatar">
							<!-- Current avatar -->
							<a href="{{ route('anggota.foto.ubah', $anggota->anggota_id) }}"><img class="img-responsive avatar-view" src="{{ asset('/images/profile/'.$anggota->foto) }}" alt="Avatar" title="Ganti Foto Profile" width="250"></a>
						</div>
					</div>
				</div>
				<br /><br />

				<div class="col-md-9 col-sm-9 col-xs-12">
					<form method="post" action="{{ route('anggota.profile.update', $anggota->anggota_id) }}">
						@csrf

						<div class="form-group">
							<div class="row">
								<div class="col-md-4 col-sm-4 col-xs-12">
									<div class="input-group">
										<input type="text" name="anggota_nama" value="{{ $anggota->anggota_nama }}" class="form-control" id="nama">
										<span class="input-group-btn">
											<label class="btn btn-success" for="nama"><i class="fa fa-edit"></i></label>
										</span>
									</div>
								</div>
							</div>
						</div>

						<div class="form-group">
							<div class="row">
								<div class="col-md-4 col-sm-4 col-xs-12">
									<div class="input-group">
										<input type="email" name="posel" value="{{ $anggota->posel }}" class="form-control" id="posel">
										<span class="input-group-btn">
											<label class="btn btn-success" for="posel"><i class="fa fa-edit"></i></label>
										</span>
									</div>
								</div>
							</div>
						</div>

						<div class="form-group">
							<div class="row">
								<div class="col-md-4 col-sm-4 col-xs-12">
									<div class="input-group">
										<input type="date" name="tanggal_lahir" value="{{ $anggota->tanggal_lahir }}" class="form-control" id="tgl">
										<span class="input-group-btn">
											<label class="btn btn-success" for="tgl"><i class="fa fa-edit"></i></label>
										</span>
									</div>
								</div>
							</div>
						</div>
					</div>
					<br /><br /><br /><br /><br />
					<br /><br /><br /><br /><br />
					<br /><br /><br /><br /><br />
					<br /><br /><br /><br />

					<div class="row"> <!-- Start Row2 -->
						<div class="col-md-4 col-sm-4 col-xs-12 profile_left">
							<div class="form-group">
								<div class="row">
									<div class="col-md-12 col-sm-12 col-xs-12">
										<div class="input-group">
											<input type="text" name="jenis_kelamin" value="{{ $anggota->jenis_kelamin }}" class="form-control" id="jk">
											<span class="input-group-btn">
												<label class="btn btn-success" for="jk"><i class="fa fa-edit"></i></label>
											</span>
										</div>
									</div>
								</div>
							</div>
						</div>

						<div class="col-md-4 col-sm-4 col-xs-12 profile_left">
							<div class="form-group">
								<div class="row">
									<div class="col-md-12 col-sm-12 col-xs-12">
										<div class="input-group">
											<input type="text" name="alamat" value="{{ $anggota->alamat }}" class="form-control" id="alamat">
											<span class="input-group-btn">
												<label class="btn btn-success" for="alamat"><i class="fa fa-edit"></i></label>
											</span>
										</div>
									</div>
								</div>
							</div>
						</div>

						<div class="col-md-4 col-sm-4 col-xs-12 profile_left">
							<div class="form-group">
								<div class="row">
									<div class="col-md-12 col-sm-12 col-xs-12">
										<div class="input-group">
											<input type="text" name="telepon" value="{{ $anggota->telepon }}" class="form-control" id="telepon">
											<span class="input-group-btn">
												<label class="btn btn-success" for="telepon"><i class="fa fa-edit"></i></label>
											</span>
										</div>
									</div>
								</div>
							</div>
						</div> 

						<div class="col-md-4 col-sm-4 col-xs-12 profile_left">
							<div class="form-group">
								<div class="row">
									<div class="col-md-12 col-sm-12 col-xs-12">
										<div class="input-group">
											<input type="text" name="facebook" value="{{ $anggota->facebook }}" class="form-control" id="facebook">
											<span class="input-group-btn">
												<label class="btn btn-success" for="facebook"><i class="fa fa-edit"></i></label>
											</span>
										</div>
									</div>
								</div>
							</div>
						</div>

						<div class="col-md-4 col-sm-4 col-xs-12 profile_left">
							<div class="form-group">
								<div class="row">
									<div class="col-md-12 col-sm-12 col-xs-12">
										<div class="input-group">
											<input type="text" name="whatsapp" value="{{ $anggota->whatsapp }}" class="form-control" id="whatsapp">
											<span class="input-group-btn">
												<label class="btn btn-success" for="whataspp"><i class="fa fa-edit"></i></label>
											</span>
										</div>
									</div>
								</div>
							</div>
						</div>

						<div class="col-md-4 col-sm-4 col-xs-12 profile_left">
							<div class="form-group">
								<div class="row">
									<div class="col-md-12 col-sm-12 col-xs-12">
										<div class="input-group">
											<input type="text" name="instagram" value="{{ $anggota->instagram }}" class="form-control" id="instagram">
											<span class="input-group-btn">
												<label class="btn btn-success" for="instagram"><i class="fa fa-edit"></i></label>
											</span>
										</div>
									</div>
								</div>
							</div>
						</div> 

						<button type="submit" id="myBtn" hidden=""></button>
					</form>
				</div><!-- End Row2 -->

			</div> <!-- End X_content -->
		</div><!-- End X_panel -->
	</div>
</div> <!-- End Row1 -->

<script>
var input = document.getElementById("nama", "tgl", "alamat", "jk", "telepon", "whatsapp", "facebook", "instagram", "posel");
input.addEventListener("keyup", function(event) {
  if (event.keyCode === 13) {
   event.preventDefault();
   document.getElementById("myBtn").click();
  }
});
</script>
@stop


