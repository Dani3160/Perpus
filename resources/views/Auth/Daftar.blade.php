@extends('layouts.user.login')

@section('judul', 'Daftar')

@section('konten')

<div class="card o-hidden border-0 shadow-lg my-5">
      <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
			<div class="row">
				<div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
				<div class="col-lg-7">
					<div class="p-5">
						<div class="text-center">
							<h1 class="h4 text-gray-900 mb-4">Daftar Akun</h1>
						</div>
						<form class="user">
							<div class="form-group row">
							<div class="col-sm-6 mb-3 mb-sm-0">
								<input type="text" name="anggota_nama" class="form-control form-control-user" id="exampleFirstName" placeholder="Masukan Nama" autocomplete="off">
							</div>
							<div class="col-sm-6">
								<input type="text" name="telepon" class="form-control form-control-user" id="exampleLastName" placeholder="Telepon / HP" autocomplete="off">
							</div>
							</div>
							<div class="form-group">
							<input type="email" name="posel" class="form-control form-control-user" id="exampleInputEmail" placeholder="Email" autocomplete="off">
							</div>
							<div class="form-group row">
							<div class="col-sm-6 mb-3 mb-sm-0">
								<input type="password" name="katasandi" class="form-control form-control-user" id="exampleInputPassword" placeholder="Password" autocomplete="off">
							</div>
							<div class="col-sm-6">
								<input type="password" name="konfirmasi_katasandi" class="form-control form-control-user" id="exampleRepeatPassword" placeholder="Konfirmasi Password">
							</div>
							</div>
							<button  class="btn btn-primary btn-user btn-block">
							Daftar Akun
							</button>
						</form>
						<hr>
						<div class="text-center">
							<a class="small" href="{{route('Masuk')}}">Sudah punya akun?</a>
						</div>
					</div>
				</div>
			</div>
		
      </div>
</div>



@stop