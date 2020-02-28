@extends('layouts.user.login')

@section('judul', 'Login')

@section('konten')

 <!-- Outer Row -->
 <div class="row justify-content-center mt-5">

 	@if(\Session::has('alert-failed'))
	<div class="alert alert-failed">
		<div>{{Session::get('alert-failed')}}</div>
	</div>
	@endif
	@if(\Session::has('alert-success'))
	<div class="alert alert-success">
		<div>{{Session::get('alert-success')}}</div>
	</div>
	@endif

	<div class="col-xl-10 col-lg-12 col-md-9">

	<div class="card o-hidden border-0 shadow-lg my-5">
		<div class="card-body p-0">
			<!-- Nested Row within Card Body -->
			<div class="row">
				<div class="col-lg-6" style="background: url('/image/logo/log.png'); background-size: cover;"></div>
					<div class="col-lg-6">
						<div class="p-5">
							<div class="text-center">
								<h1 class="h4 text-gray-900 mb-5" style="font-weight:bold;">NURISPERPUS</h1>
							</div>
							<form class="user" action="/Masuk-Akun" method="post">
								@csrf
								<div class="form-group">
									<input type="email" name="email" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Email" autocomplete="off">
								</div>
								<div class="form-group">
									<input type="password" name="password" class="form-control form-control-user" id="exampleInputPassword" placeholder="Password" autocomplete="off">
								</div>
								<div class="form-group">
									<div class="custom-control custom-checkbox small">
										<input type="checkbox" class="custom-control-input" id="customCheck">
										<label class="custom-control-label" for="customCheck">Remember Me</label>
									</div>
								</div>
								<button type="submit" class="btn btn-primary btn-user btn-block">
									Login
								</button>
							</form>
							<hr>
							<div class="text-center">
								<a class="small" href="{{url('/email')}}">Lupa katasandi?</a>
							</div>
							<div class="text-center">
								<a class="small" href="{{route('Daftar')}}">Buat Akun!</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

	</div>

</div>

@stop