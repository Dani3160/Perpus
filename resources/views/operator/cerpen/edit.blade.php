@extends('layouts.operator.master')

@section('judul')
Konfirmasi Cerpen - Operator
@stop

@section('konten')
	<div class="col-md-12 mt-5 mb-5">
		<div class="card shadow">
			<div class="card-body">
				<h4 class="text-dark"><i class="fas fa-pen"></i> Detail Cerpen</h4>
				<hr>
				
				<form action="{{ route('operator.cerpen.store') }}" method="POST" class="form-horizontal form-label-left input_mask" enctype="multipart/form-data">
					@csrf
					<input type="hidden" name="cerpen_id" value="{{ $cerpen->cerpen_id }}">
					<div class="col-md-12">
						<div class="row">
							<div class="col-md-12 form-group">
								<label for="judul">Judul*</label>
								<input type="text" name="cerpen_judul" class="form-control" autocomplete="off" value="{{ $cerpen->cerpen_judul }}" required readonly>
							</div>	
							<div class="col-md-12 form-group">
								<label for="cerpen_karya">Karya*</label>
								<input type="text" name="cerpen_karya" class="form-control" autocomplete="off" value="{{ $cerpen->cerpen_karya }}" required readonly>
							</div>
							<div class="col-md-12 form-group">
								<label for="cerpen_gambar">Gambar*</label>
								<input type="text" name="cerpen_gambar" class="form-control" autocomplete="off" value="{{ $cerpen->cerpen_gambar }}" required readonly>
							</div>
                            <div class="col-md-12 form-group">
								<label for="anggota_id">Postingan*</label>
								<select name="anggota_id" id="" class="custom-select">
                                    @foreach($anggota as $value => $data)
                                        @if($cerpen->anggota_id == $data->id)
                                        <option value="{{$data->anggota_id}}" selected readonly>{{$data->name}}</option>
                                        @endif
                                    @endforeach
                                </select>
							</div>
                            <div class="col-md-12 form-group">
                                <label for="">Isi cerpen</label>
                                <textarea name="cerpen_isi" id="" class="form-control" cols="30" rows="3">
                                    {{$cerpen->cerpen_isi}}
                                </textarea>
                            </div>
						</div>
					</div>			
					
					<div class="col-md-12">
						<div class="row">
							<div class="col-md-7">
								&nbsp;
							</div>
							<div class="col-md-5">
								<a href="{{ route('operator.cerpen') }}" class="btn btn-danger float-right"><i class="fas fa-arrow-left"></i> Kembali</a>
							</div>
						</div>
					</div>
				</form>
				
			</div>
		</div>
	</div>
@stop
