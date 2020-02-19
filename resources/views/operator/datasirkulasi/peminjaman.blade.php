@extends('layouts.operator.master')

@section('judul')
Peminjaman Buku
@stop

@section('konten')

<div class="col-md-12">
	<div class="tab mt-5">
		<button class="tablinks" id="defaultOpen" onclick="openTabs(event, 'peminjamanForm')">Form Peminjaman</button>
		<button class="tablinks" onclick="openTabs(event, 'pengembalianForm')">Form Pengembalian</button>
		<button class="tablinks" onclick="openTabs(event, 'peminjaman')">Riwayat Peminjaman</button>
        <button class="tablinks" onclick="openTabs(event, 'pengembalian')">Riwayat Pengembalian</button>
	</div>
</div>

<div id="peminjamanForm" class="tabcontent">
    <div class="row justify-content-center mt-2 mb-5">
        <div class="col-md-8 mt-5">
            <div class="card shadow">
                <div class="card-body">
                    <h5 class="text-dark"><i class="fa fa-book"></i> Form Peminjaman Buku</h5>
                    <hr>
                    <form action="{{route('operator.sirkulasi.peminjaman.proses')}}" method="post">
                        @csrf
                    
                        <div class="form-group">
                            <label>Masukkan Nama Anggota</label>
                            <select class="cari" style="width: 100%; font-size: 17px;" required name="anggota_id"></select>
                        </div>
                        <div class="form-group">
                            <label>Masukkan Buku Yang Akan Di Pinjam</label>
                            <select class="cari2" style="width: 100%;" required name="biblio_id"></select>
                        </div>
            
                        <div class="form-group">
                            <label>Mulai Pinjam Pada Tanggal</label>
                            <input type="date" name="mulai_pinjam" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Status</label>
                            
                            <select name="status_sirkulasi_id" id="status" class="custom-select" readonly>
                                @foreach($status as $s)
                                <option value="{{$s->status_sirkulasi_id}}">{{$s->status_sirkulasi_nama}}</option>
                                @endforeach
                            </select>
                        </div>
                            
                        <div class="form-group mt-2">
                            <button class="btn btn-success btn-sm float-right"><i class="fas fa-save"></i> Simpan</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
</div>

<div id="pengembalianForm" class="tabcontent">
    <div class="row justify-content-center mt-2 mb-5">
        <div class="col-md-8 mt-5">
            <div class="card shadow">
                <div class="card-body">
                    <h5 class="text-dark"><i class="fas fa-book"></i> Form Pengembalian Buku</h5>
                    <hr>
                    <form action="{{route('operator.sirkulasi.pengembalian.proses')}}" method="post">
                        @csrf
                        <div class="form-group">
                            <label>Masukkan Nama Anggota *</label>
                            <select class="cari3" style="width: 100%;" required name="anggota_id"></select>
                        </div>
                        <div class="form-group">
                            <label>Masukkan Buku Yang Akan Di Kembalikan *</label>
                            <select class="cari4" style="width: 100%;" required name="biblio_id"></select>
                        </div>
                        <div class="form-group">
                            <label>Di Kembalikan Pada Tanggal *</label>
                            <input type="date" name="kembali_pinjam" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Status *</label>
                            
                            <select name="status_sirkulasi_id" id="status" class="custom-select">
                                @foreach($status2 as $s)
                                <option value="{{$s->status_sirkulasi_id}}">{{$s->status_sirkulasi_nama}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-success btn-sm float-right"><i class="fas fa-save"></i> Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<div id="peminjaman" class="tabcontent">
    <div class="row">
        <div class="col-md-12">
            
            <div class="table table-responsive mt-4">
                <table class="table table-bordered" id="peminjamanDatatable">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Anggota</th>
                            <th>Nama Buku</th>
                            <th>Eksemplar</th>
                            <th>Mulai Pinjam</th>
                            <th>Di Kembalikan</th>
                            <th>Perpanjangan</th>
                            <th>Keterangan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                </table>  
            </div>  

        </div>
    </div>
    
</div>

<div id="pengembalian" class="tabcontent">
    <div class="row">
        <div class="col-md-12">

            <div class="table table-responsive mt-4">
                <table class="table table-striped table-bordered dt-row" id="pengembalianDatatable">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Anggota</th>
                            <th>Nama Buku</th>
                            <th>Eksemplar</th>
                            <th>Mulai Pinjam</th>
                            <th>Di Kembalikan</th>
                        </tr>
                    </thead>
                </table>
            </div>

        </div>

   </div> 
</div>

@stop 

@push('scripts')
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
<script type="text/javascript">
  $('.cari2').select2({
    placeholder: 'Cari nama buku disini...',
    ajax: {
      url: '/operator/sirkulasi/search/biblio',
      dataType: 'json',
      delay: 250,
      processResults: function (data) {
        return {
          results:  $.map(data, function (item) {
            return {
              text: item.judul + ' , ' +  item.eksemplar,
              id: item.biblio_id
            }
          })
        };
      },
      cache: true
    }
  });
</script>
<script type="text/javascript">
  $('.cari3').select2({
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
<script type="text/javascript">
  $('.cari4').select2({
    placeholder: 'Cari nama buku disini...',
    ajax: {
      url: '/operator/sirkulasi/search/biblio/back',
      dataType: 'json',
      delay: 250,
      processResults: function (data) {
        return {
          results:  $.map(data, function (item) {
            return {
              text: item.judul + ' , ' +  item.eksemplar,
              id: item.biblio_id
            }
          })
        };
      },
      cache: true
    }
  });
</script>
<script type="text/javascript">
  $(function() {
   $('#peminjamanDatatable').DataTable({
    order: [[0, 'desc']],
    processing: true,
    stateSave: true,
    "bDestroy": true,
    responsive: true,
    serverSide: true,
    ajax: '{!! route('operator.sirkulasi.riwayat.peminjaman') !!}',
    columns: [
    {data: 'DT_RowIndex', name: 'sirkulasi_id', width: '150px'},
    {data: 'name', name: 'name', width: '140px'},
    {data: 'judul', name: 'judul', },
    {data: 'eksemplar', name: 'eksemplar', },
    {data: 'mulai_pinjam', name: 'mulai_pinjam', },
    {data: 'kembali_pinjam', name: 'kembali_pinjam', },
    {data: 'perpanjangan', name: 'perpanjangan', },
    {data: 'Denda', name: 'Denda', width: '100px', orderable: true},
    {data: 'action', name: 'action', width: '100px', orderable: false, searchable: false},
    ]
  });
 });
</script>
<script type="text/javascript">
  $(function() {
   $('#pengembalianDatatable').DataTable({
    order: [[0, 'desc']],
    processing: true,
    responsive: true,
    "bDestroy": true,
    serverSide: true,
    ajax: '{!! route('operator.sirkulasi.riwayat.pengembalian') !!}',
    columns: [
    {data: 'DT_RowIndex', name: 'sirkulasi_id', width: '5px'},
    {data: 'name', name: 'name', width: '140px'},
    {data: 'judul', name: 'judul', },
    {data: 'eksemplar', name: 'eksemplar', },
    {data: 'mulai_pinjam', name: 'mulai_pinjam', },
    {data: 'kembali_pinjam', name: 'kembali_pinjam', },
    ]
  });
 });
</script>
@endpush
