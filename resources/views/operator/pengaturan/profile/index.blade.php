@extends('layouts.operator.master')

@section('judul', 'Profile')

@section('konten')
<div class="container">
	<div class="row"> <!-- Start Row1 -->
		<div class="col-md-12 col-sm-12 col-xs-12 mt-5 mb-5">
			<div class="card shadow"> <!-- Star X_panel -->
				<div class="card-body"> <!-- Star X_content -->

					<h4 class="text-dark">Tekan Enter Untuk Menyimpan Perubahan Profile Anda</h4>

					<hr>

					<div class="row justify-content-center mt-5">
						<div class="profile_img">
							<div id="crop-avatar">
								<!-- Current avatar -->
								<center>
									<label for="file-input-foto">
										<img class="img-responsive rounded-circle avatar-view" src="{{ asset('/operator/image/profile/'.$anggota->foto) }}" alt="Avatar" title="Ganti Foto Profile" width="250">
									</label>
								</center>
								<input style="display: none;" id="file-input-foto" type="file" name="foto" accept="image/png,image/jpeg,image/*"/>
							</div>
						</div>
					</div>
					<br /><br />

					<div class="col-md-9 col-sm-9 col-xs-12">
						<form method="post" action="{{ route('anggota.profile.update', $anggota->anggota_id) }}">
							@csrf
					</div>
						<div class="row"> <!-- Start Row2 -->
							
							<div class="col-md-4 col-sm-4 col-xs-12 profile_left">
								<div class="form-group">
									<div class="row">
										<div class="col-md-12 col-sm-12 col-xs-12">
											<div class="input-group">
												<input type="text" name="anggota_nama" value="{{ $anggota->anggota_nama }}" class="form-control" id="nama" placeholder="Masukkan nama anda...">
												<span class="input-group-btn">
													<label class="btn btn-success" for="nama"><i class="fa fa-edit"></i></label>
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
												<input type="email" name="posel" value="{{ $anggota->posel }}" class="form-control" id="posel" placeholder="Masukkan email anda...">
												<span class="input-group-btn">
													<label class="btn btn-success" for="posel"><i class="fa fa-edit"></i></label>
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
												<input type="date" name="tanggal_lahir" value="{{ $anggota->tanggal_lahir }}" class="form-control" id="tgl">
												<span class="input-group-btn">
													<label class="btn btn-success" for="tgl"><i class="fa fa-edit"></i></label>
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
												<input type="text" name="jenis_kelamin" value="{{ $anggota->jenis_kelamin }}" class="form-control" id="jk" placeholder="Masukkan jenis kelamin anda...">
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
												<input type="text" name="alamat" value="{{ $anggota->alamat }}" class="form-control" id="alamat" placeholder="Masukkan alamat anda...">
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
												<input type="text" name="telepon" value="{{ $anggota->telepon }}" class="form-control" id="telepon" placeholder="Masukkan nomor telepon / hp anda...">
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
												<input type="text" name="facebook" value="{{ $anggota->facebook }}" class="form-control" id="facebook" placeholder="Masukkan nama facebook anda...">
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
												<input type="text" name="whatsapp" value="{{ $anggota->whatsapp }}" class="form-control" id="whatsapp" placeholder="Masukkan nomor whatsapp anda...">
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
												<input type="text" name="instagram" value="{{ $anggota->instagram }}" class="form-control" id="instagram" placeholder="Masukkan nama instagram anda...">
												<span class="input-group-btn">
													<label class="btn btn-success" for="instagram"><i class="fa fa-edit"></i></label>
												</span>
											</div>
										</div>
									</div>
								</div>
							</div> 

							<div class="col-md-12">
								<div class="container">
									<h5 class="text-dark mb-3">Keterangan :</h5>
									<p class="text-primary">L : Laki - Laki</p>
									<p class="text-danger">P : Perempuan</p>
								</div>
							</div>

							<button type="submit" id="myBtn" hidden=""></button>
						</form>
					</div><!-- End Row2 -->

				</div> <!-- End X_content -->
			</div><!-- End X_panel -->
		</div>
	</div> <!-- End Row1 -->
</div>

@stop
@push('scripts')
<script>
var input = document.getElementById("nama", "tgl", "alamat", "jk", "telepon", "whatsapp", "facebook", "instagram", "posel");
input.addEventListener("keyup", function(event) {
  if (event.keyCode === 13) {
   event.preventDefault();
   document.getElementById("myBtn").click();
  }
});
</script>
@endpush

