@extends('layouts.operator.master')

@section('judul')
Konfirmasi puisi - Operator
@stop

@section('konten')
	<div class="col-md-12 mt-5 mb-5">
		<div class="card shadow">
			<div class="card-body">
				<h4 class="text-dark"><i class="fas fa-pen"></i> Detail puisi</h4>
				<hr>
				
				<form action="{{ route('operator.puisi.store') }}" method="POST" class="form-horizontal form-label-left input_mask" enctype="multipart/form-data">
					@csrf
					<input type="hidden" name="puisi_id" value="{{ $puisi->puisi_id }}">
					<div class="col-md-12">
						<div class="row">
							<div class="col-md-12 form-group">
								<label for="judul">Judul*</label>
								<input type="text" name="puisi_judul" class="form-control" autocomplete="off" value="{{ $puisi->puisi_judul }}" required readonly>
							</div>	
							<div class="col-md-12 form-group">
								<label for="puisi_karya">Karya*</label>
								<input type="text" name="puisi_karya" class="form-control" autocomplete="off" value="{{ $puisi->puisi_karya }}" required readonly>
							</div>
							<div class="col-md-12 form-group">
								<label for="puisi_gambar">Gambar*</label>
								<input type="text" name="puisi_gambar" class="form-control" autocomplete="off" value="{{ $puisi->puisi_gambar }}" required readonly>
							</div>
                            <div class="col-md-12 form-group">
								<label for="anggota_id">Postingan*</label>
								<select name="anggota_id" id="" class="custom-select">
                                    @foreach($anggota as $value => $data)
                                        @if($puisi->anggota_id == $data->id)
                                        <option value="{{$data->anggota_id}}" selected readonly>{{$data->name}}</option>
                                        @endif
                                    @endforeach
                                </select>
							</div>
                            <div class="col-md-12 form-group">
                                <label for="">Bait Satu</label>
                                <textarea name="bait1" id="" class="form-control" cols="30" rows="3">
                                    {{$puisi->bait1}}
                                </textarea>
                            </div>
                            <div class="col-md-12 form-group">
                                <label for="">Bait Dua</label>
                                <textarea name="bait2" id="" class="form-control" cols="30" rows="3">
                                    {{$puisi->bait2}}
                                </textarea>
                            </div>
                            <div class="col-md-12 form-group">
                                <label for="">Bait Tiga</label>
                                <textarea name="bait3" id="" class="form-control" cols="30" rows="3">
                                    {{$puisi->bait3}}
                                </textarea>
                            </div>
                            <div class="col-md-12 form-group">
                                <label for="">Bait Empat</label>
                                <textarea name="bait4" id="" class="form-control" cols="30" rows="3">
                                    {{$puisi->bait4}}
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
								<a href="{{ route('operator.puisi') }}" class="btn btn-danger float-right"><i class="fas fa-arrow-left"></i> Kembali</a>
							</div>
						</div>
					</div>
				</form>
				
			</div>
		</div>
	</div>
@stop
