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
						<form action="{{route('register')}}" method="POST" class="user">
						@csrf
							<div class="form-group row">
							<div class="col-sm-6 mb-3 mb-sm-0">
								<input type="text" name="name" class="form-control @error('name') is-invalid @enderror form-control-user" id="exampleFirstName" placeholder="Masukan Nama" autocomplete="off">
								@error('name')
								<span class="invalid-feedback" role="alert">
									<strong>{{ $message }}</strong>
								</span>
								@enderror
							</div>
							<div class="col-sm-6">
								<input type="text" name="telepon" class="form-control @error('telepon') is-invalid @enderror form-control-user" id="exampleLastName" placeholder="Telepon / HP" autocomplete="off">
								@error('telepon')
								<span class="invalid-feedback" role="alert">
									<strong>{{ $message }}</strong>
								</span>
								@enderror
							</div>
							</div>
							<div class="form-group">
								<input type="email" name="email" class="form-control @error('email') is-invalid @enderror form-control-user" id="exampleInputEmail" placeholder="Email" autocomplete="off">
								@error('email')
								<span class="invalid-feedback" role="alert">
									<strong>{{ $message }}</strong>
								</span>
								@enderror
							</div>
							<div class="form-group row">
							<div class="col-sm-6 mb-3 mb-sm-0">
								<input type="password" name="password" class="form-control @error('password') is-invalid @enderror form-control-user" id="exampleInputPassword" placeholder="Password" autocomplete="off">
								@error('password')
								<span class="invalid-feedback" role="alert">
									<strong>{{ $message }}</strong>
								</span>
								@enderror
							</div>
							<div class="col-sm-6">
								<input type="password" name="password_confirmation" class="form-control  @error('password') is-invalid @enderror form-control-user" id="exampleRepeatPassword" placeholder="Konfirmasi Password">
								@error('password')
								<span class="invalid-feedback" role="alert">
									<strong>{{ $message }}</strong>
								</span>
								@enderror
							</div>
							</div>
							<button type="submit" class="btn btn-primary btn-user btn-block">
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