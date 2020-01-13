@extends('layouts.admin.master')

@section('judul', 'Profile')

@section('subJudul')
<h3>Halaman Sistem</h3>
@stop

@section('konten')
<div class="row"> <!-- Start Row1 -->
	<div class="col-md-12 col-sm-12 col-xs-12">
		<div class="x_panel"> <!-- Star X_panel -->
			<div class="x_content"> <!-- Star X_content -->

				<div class="form-group">
					<div class="row">
						<div class="col-md-4 col-sm-4 col-xs-12">
							<form method="post" action="{{ route('operator.sistem.update', $pengaturan->pengaturan_id) }}">
								@csrf

								<div class="input-group">
									<input type="text" name="tentang_kami" value="{{ $pengaturan->tentang_kami }}" class="form-control" id="ttgKami">
									<span class="input-group-btn">
										<label class="btn btn-success" for="ttgKami"><i class="fa fa-edit"></i></label>
									</span>
								</div>
							</div>
						</div>
					</div>

					<div class="form-group">
						<div class="row">
							<div class="col-md-4 col-sm-4 col-xs-12">
								<div class="input-group">
									<input type="text" name="tempat" value="{{ $pengaturan->tempat }}" class="form-control" id="tempat">
									<span class="input-group-btn">
										<label class="btn btn-success" for="tempat"><i class="fa fa-edit"></i></label>
									</span>
								</div>
							</div>
						</div>
					</div>

					<div class="form-group">
						<div class="row">
							<div class="col-md-4 col-sm-4 col-xs-12">
								<div class="input-group">
									<input type="text" name="hak_cipta" value="{{ $pengaturan->hak_cipta }}" class="form-control" id="hakCipta">
									<span class="input-group-btn">
										<label class="btn btn-success" for="hakCipta"><i class="fa fa-edit"></i></label>
									</span>
								</div>
							</div>
						</div>

						<button type="submit" id="myBtn" hidden=""></button>
					</form>
				</div>

			</div> <!-- End X_content -->
		</div><!-- End X_panel -->
	</div>
</div> <!-- End Row1 -->



<script>
	var input = document.getElementById("ttgKami", "tempat", "hakCipta");
	input.addEventListener("keyup", function(event) {
		if (event.keyCode === 13) {
			event.preventDefault();
			document.getElementById("myBtn").click();
		}
	});
</script>

@stop


