@extends('layouts.operator.master')

@section('judul')
	Detail Biblio - Operator
@stop

@section('konten')
	<div class="col-md-12 mt-5 mb-3">
		<div class="card shadow">
			<div class="card-body">
				<h4 class="text-dark"><i class="fas fa-search"></i> Detail Biblio</h4>
				<hr>
				<form action="#" class="form-horizontal form-label-left input_mask" enctype="multipart/form-data">
					@csrf
					<div class="col-md-12 mt-3">
						<div class="row">
							<div class="col-md-4 form-group">
								<label for="judul">Judul*</label>
								<input type="text" name="judul" class="form-control" value="{{ $biblio->judul }}" disabled>
							</div>	
							<div class="col-md-4 form-group">
								<label for="edisi">Edisi*</label>
								<input type="text" name="edisi" class="form-control" value="{{ $biblio->edisi }}" disabled>
							</div>
							<div class="col-md-4 form-group">
								<label for="penerbit_tempat">Tempat Terbit Buku*</label>
								<input type="text" name="penerbit_tempat" class="form-control" value="{{ $biblio->penerbit_tempat }}" disabled>
							</div>
						</div>
					</div>				
					<div class="col-md-12">
						<div class="row">
							<div class="col-md-4 form-group">
								<label for="search_penulis">Penulis*</label>
								@foreach($penulis as $value => $data)
									@if($biblio->penulis_id == $data->penulis_id)
										<input type="text" name="penulis_id" class="form-control" value="{{ $data->penulis_nama }}" disabled>
									@endif
								@endforeach
							</div>

							<div class="col-md-4 form-group">
								<label for="isbn">ISBN*</label>
								<input type="text" name="isbn" class="form-control" value="{{ $biblio->isbn }}" disabled>
							</div>

							<div class="col-md-4 form-group">
								<label for="penerbit_search">Penerbit*</label>
								@foreach($penerbit as $value => $data)
									@if($biblio->penerbit_id == $data->penerbit_id)
										<input type="text" name="penerbit_id" class="form-control" value="{{ $data->penerbit_nama }}" disabled>
									@endif
								@endforeach
							</div>	
						</div>
					</div>
					<div class="col-md-12">
						<div class="row">
							<div class="col-md-4 form-group">
								<label for="harga_buku">Harga Buku*</label>
								<input type="text" name="harga_buku" class="form-control harga" value="{{ $biblio->harga_buku }}" disabled>
							</div>
							<div class="col-md-4 form-group">
								<label for="penerbit_tahun">Tahun Terbit Buku*</label>
								<input type="text" name="penerbit_tahun" class="form-control" value="{{ $biblio->penerbit_tahun }}" disabled>
							</div>
							<div class="col-md-4 form-group">
								<label for="deskripsi">Deskripsi*</label>
								<textarea class="form-control" rows="3" id="deskripsi" disabled>{{ $biblio->deskripsi }}</textarea>
							</div>
						</div>
					</div>
					<div class="col-md-12">
						<div class="row">
							<div class="col-md-4 form-group">
								<label for="tipekoleksi_id">Tipe Koleksi*</label>
								@foreach($tipekoleksi as $value => $data)
									@if($biblio->tipekoleksi_id == $data->tipekoleksi_id)
										<input type="text" name="tipekoleksi_id" class="form-control" value="{{ $data->tipekoleksi_nama }}" disabled>
									@endif
								@endforeach
							</div>
							<div class="col-md-4 form-group">
								<label for="klasifikasi_id">Klasifikasi*</label>
								@foreach($klasifikasi as $value => $data)
									@if($biblio->klasifikasi_id == $data->klasifikasi_id)
										<input type="text" name="klasifikasi_id" class="form-control" value="{{ $data->klasifikasi_nama }}" disabled>
									@endif
								@endforeach
							</div>
							<div class="col-md-4 col-sm-4 col-xs-12 form-group">
								<label for="panggil">Panggil Rak Buku*</label>
								<input type="text" name="panggil" class="form-control" value="{{ $biblio->panggil }}" disabled>
							</div>
						</div>
					</div>
					<div class="col-md-12">
						<div class="row">
							<div class="col-md-4 form-group">
								<label for="eksemplar">Eksemplar*</label>
								<input type="text" name="tingkatan" class="form-control" value="{{ $biblio->eksemplar }}" disabled>
							</div>
							<div class="col-md-4 form-group">
								<label>Gambar Buku*</label>
								<?php $data = $biblio->gambar; ?>
								@if($data == true)
									<img src="/image/datamaster/biblio/{{ $biblio->gambar }}" class="img-thumbnail">
								@else
									<input type="text" name="lampiran" class="form-control" disabled value="File Lampiran buku tidak tersedia.">
								@endif
							</div>
							<div class="col-md-4 form-group">
								<label>Lampiran Buku*</label>
								<?php $data = $biblio->lampiran; ?>
								@if($data == true)
								<?php $path = Storage::url('file/datamaster/biblio/'.$biblio->lampiran); ?>
								<embed src="{{ $path }}" type="application/pdf" width="100%" height="410px" ></embed>
								@else 
								<input type="text" name="lampiran" class="form-control" disabled value="File Lampiran buku tidak tersedia.">
								@endif
							</div>
						</div>
					</div>
					<div class="col-md-12">
						<div class="row">
							<div class="col-md-4 form-group">
								<label>Status Buku*</label>
								@foreach($statusitem as $value => $data)
									@if($biblio->status_item_id == $data->status_item_id)
										<input type="text" name="status_item_id" class="form-control" value="{{ $data->status_item_nama }}" disabled>
									@endif
								@endforeach
							</div>

							<div class="col-md-4 form-group">
								<label>Sumber Buku*</label>
								@foreach($sumberitem as $value => $data)
									@if($biblio->sumber_item_id == $data->sumber_item_id)
										<input type="text" name="sumber_item_id" class="form-control" value="{{ $data->sumber_item_nama }}" disabled>
									@endif
								@endforeach
							</div>	
						</div>
					</div>
					<div class="col-md-12">
						<div class="row">
							<div class="col-md-6">
								<label>
									<input type="checkbox" name="publik" value="1" {{ $biblio->publik ? 'checked' : '' }} disabled> Publik
								</label>
							</div>

							<div class="col-md-6">
								<label>
									<input type="checkbox" name="promosi" value="1" {{ $biblio->promosi ? 'checked' : '' }} disabled> Promosi
								</label>
							</div>	
						</div>
					</div>

					<div class="col-md-12">
						<div class="row">
							<div class="col-md-7">
								&nbsp;
							</div>
							<div class="col-md-5">
								<a href="{{ route('operator.biblio') }}" class="btn btn-danger float-right"><i class="fas fa-arrow-left"></i> Kembali</a>
							</div>
						</div>
					</div>
				</form>
				
			</div>
		</div>
	</div>
@stop

@push('scripts')
{{-- Format Mata Uang --}}
<script type="text/javascript">
	$(document).ready(function() {

                // Format mata uang.
                $( '.harga' ).mask('000.000.000', {reverse: true});

            });
</script>
@endpush