@extends('layouts.operator.master')
@section('judul')
Resume - Operator  
@stop

@section('konten')
<div class="col-md-12">
    <div class="tab mt-5">
		<button class="tablinks" id="defaultOpen" onclick="openTabs(event, 'list-tabel')">Data Resume</button>
		<button class="tablinks" onclick="openTabs(event, 'tambah')">Tambah Resume</button>
	</div>
</div>

<div id="list-tabel" class="tabcontent">
  <div class="row">
      <div class="col-md-12">          

          <div class="table table-responsive mt-4">
              <table class="table table-bordered" id="resumeDatatable">
                  <thead>
                      <tr>
                          <th>No</th>
                          <th>Nama Anggota</th>
                          <th>Kelas</th>
                          <th>Judul</th>
                          <th>Hari</th>
                          <th>tanggal Resume</th>
                          <th>Aksi</th>
                      </tr>
                  </thead>
              </table>  
          </div>  

      </div>
  </div>
</div>

<div id="tambah" class="tabcontent">
  <div class="container mb-5">
    <div class="row mt-4">
      <div class="col-md-12 mt-5">
        <div class="card shadow">
          <div class="card-body">
            <h5 class="text-dark">Tambah Resume</h5>
            <hr>
            <form action="{{route('operator.resume.store')}}" method="post">
              @csrf 
              <div class="row">
                <div class="form-group col-md-6">
                  <label for="frmAnggota">Nama Anggota*</label>
                  <select class="cari" style="width: 100%; font-size: 17px;" required name="anggota_id" id="frmAnggota"></select>
                </div>
                <div class="form-group col-md-6">
                  <label for="frmKelas">Kelas*</label>
                  <select name="kelas_id" id="frmKelas" class="custom-select">
                    <option value="">Pilih Kelas</option>
                    @foreach($kelas as $data)
                    <option value="{{$data->kelas_id}}">{{$data->kelas_nama}}</option>
                    @endforeach
                  </select>
                </div>
              </div>
              <div class="row">
                <div class="form-group col-md-12">
                  <label for="frmJudul">Judul*</label>
                  <input type="text" name="resume_judul" class="form-control" id="frmJudul" placeholder="Masukan judul resume">
                </div>
              </div>
              <div class="row">
                <div class="form-group col-md-6">
                  <label for="frmHari">Hari*</label>
                  <select name="hari" id="frmHari" class="custom-select">
                    <option value="">Pilih Hari</option>
                    <option value="Senin">Senin</option>
                    <option value="Selasa">Selasa</option>
                    <option value="Rabu">Rabu</option>
                    <option value="Kamis">Kamis</option>
                    <option value="Jum'at">Jum'at</option>
                    <option value="Sabtu">Sabtu</option>
                    <option value="Minggu">Minggu</option>
                  </select>
                </div>
                <div class="form-group col-md-6">
                  <label for="frmTgl">Tanggal Resume*</label>
                  <input type="date" class="form-control" id="frmTgl" name="tanggal_resume">
                </div>
              </div>
              
              <div class="form-group">
                <label for="frmIsi">Isi</label>
                <textarea name="resume_isi" id="frmIsi" cols="30" rows="10" class="form-control" placeholder="Masukkan isi resume..."></textarea>
              </div>
              
              <div class="form-group">
                <button class="btn btn-success sm float-right"><i class="fas fa-save"></i> Simpan</button>
              </div>
            </form>
          </div>
        </div>        
      </div>
    </div>
  </div>
</div>

@stop
@push('scripts')

<script type="text/javascript">
  $(function() {
   $('#resumeDatatable').DataTable({
    order: [[0, 'desc']],
    processing: true,
    stateSave: true,
    "bDestroy": true,
    responsive: true,
    serverSide: true,
    ajax: '{!! route('operator.resume.datatable') !!}',
    columns: [
    {data: 'DT_RowIndex', name: 'resume_id', width: '150px'},
    {data: 'name', name: 'name', width: '140px'},
    {data: 'kelas_nama', name: 'kelas_nama', },
    {data: 'resume_judul', name: 'resume_judul', },
    {data: 'hari', name: 'hari', },
    {data: 'tanggal_resume', name: 'tanggal_resume', },
    {data: 'action', name: 'action', width: '100px', orderable: false, searchable: false},
    ]
  });
 });
</script>

<script type="text/javascript">
  $('.cari').select2({
    placeholder: 'Cari nama anggota disini...',
    ajax: {
      url: '/operator/sirkulasi/search/anggota',
      dataType: 'json',
      delay: 250,
      processResults: function (data) {
        return {
          results:  $.map(data, function (item) {
            return {
              text: item.name,
              id: item.id
            }
          })
        };
      },
      cache: true
    }
  });
</script>

<script>
$(document).ready(function(){
    $('.toast').toast('show', 1500);
});
</script>

<script type="text/javascript">
function openTabs(evt, cityName) {
  var i, tabcontent, tablinks;
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablinks");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" active", "");
  }
  document.getElementById(cityName).style.display = "block";
  evt.currentTarget.className += " active";
}
// Get the element with id="defaultOpen" and click on it
document.getElementById("defaultOpen").click();
</script>

@endpush