@extends('layouts.operator.master')

@section('judul')
Konfirmasi Novel - Operator
@stop

@section('konten')
	<div class="col-md-12 mt-5 mb-5">
		<div class="card shadow">
			<div class="card-body">
				<h4 class="text-dark"><i class="fas fa-pen"></i> Detail Novel</h4>
				<hr>
				
				<form action="{{ route('operator.novel.store') }}" method="POST" class="form-horizontal form-label-left input_mask" enctype="multipart/form-data">
					@csrf
					<input type="hidden" name="novel_id" value="{{ $novel->novel_id }}">
					<div class="col-md-12">
						<div class="row">
							<div class="col-md-12 form-group">
								<label for="judul">Judul*</label>
								<input type="text" name="novel_judul" class="form-control" autocomplete="off" value="{{ $novel->novel_judul }}" required readonly>
							</div>	
							<div class="col-md-12 form-group">
								<label for="novel_karya">Karya*</label>
								<input type="text" name="novel_karya" class="form-control" autocomplete="off" value="{{ $novel->novel_karya }}" required readonly>
							</div>
							<div class="col-md-12 form-group">
								<label for="novel_gambar">Gambar*</label>
								<input type="text" name="novel_gambar" class="form-control" autocomplete="off" value="{{ $novel->novel_gambar }}" required readonly>
							</div>
                            <div class="col-md-12 form-group">
								<label for="anggota_id">Postingan*</label>
								<select name="anggota_id" id="" class="custom-select">
                                    @foreach($anggota as $value => $data)
                                        @if($novel->anggota_id == $data->anggota_id)
                                        <option value="{{$data->anggota_id}}" selected readonly>{{$data->anggota_nama}}</option>
                                        @endif
                                    @endforeach
                                </select>
							</div>
                            <div class="col-md-12 form-group">
                                <label for="">Isi Novel</label>
                                <textarea name="novel_isi" id="" class="form-control" cols="30" rows="3">
                                    {{$novel->novel_isi}}
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
								<a href="{{ route('operator.novel') }}" class="btn btn-danger float-right"><i class="fas fa-arrow-left"></i> Kembali</a>
							</div>
						</div>
					</div>
				</form>
				
			</div>
		</div>
	</div>
@stop
