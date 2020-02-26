@extends('layouts.user.master')

@section('judul')
Unggah Karya
@stop

@section('navKonten')
<h4 class="mb-0"><a href="{{route('user.dashboard')}}" class="text-white"><i class="fas fa-angle-left"></i></a> </h4> 
@stop
 
@section('konten')

<h5 class="mt-3 text-dark" style="font-weight:bold;">
    <img src="{{asset('user/image/unggah.png')}}" style="width: 40px; height: 30px;" alt=""> Unggah Karya
</h5>

<div class="tab mt-4">
    <button class="tablinks" id="defaultOpen" onclick="openTabs(event, 'cerpen')">Cerpen</button>
    <button class="tablinks" onclick="openTabs(event, 'novel')">Novel</button>
    <button class="tablinks" onclick="openTabs(event, 'puisi')">Puisi</button>
</div>


<div id="cerpen" class="tabcontent mt-4">
    <form action="{{route('user.unggah.cerpen')}}" method="post" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="anggota_id" value="{{Auth::user()->id}}">
        <div class="form-group">
            <label>Judul</label>
            <input class="form-control" type="text" name="cerpen_judul" placeholder="Judul Cerpen" autocomplete="off">
        </div>
        
        <div class="form-group">
            <label>Karya</label>
            <input class="form-control" type="text" name="cerpen_karya" placeholder="Karya" autocomplete="off">
        </div>

        <div class="form-group">
            <label>Gambar</label>
            <input class="form-control" type="file" name="cerpen_gambar">
        </div>
        
        <div class="form-group">
            <label>Isi Cerpen</label>
            <textarea class="form-control" name="cerpen_isi" cols="30" rows="6" placeholder="Isi cerpen"></textarea>
        </div>
        
        <button class="btn btn-info float-right mb-5" style="background: #5caeea;"><i class="fas fa-upload"></i> Unggah</button>
    </form>
</div>

<div id="novel" class="tabcontent mt-4">
    <form action="{{route('user.unggah.novel')}}" method="post" enctype="multipart/form-data">
        @csrf 
        <input type="hidden" name="anggota_id" value="{{Auth::user()->id}}">
        <div class="form-group">
            <label>Judul</label>
            <input class="form-control" type="text" name="novel_judul" placeholder="Judul novel" autocomplete="off">
        </div>

        <div class="form-group">
            <label>Karya</label>
            <input class="form-control" type="text" name="novel_karya" placeholder="Karya" autocomplete="off">
        </div>
        
        <div class="form-group">
            <label>Gambar</label>
            <input class="form-control" type="file" name="novel_gambar">
        </div>
        
        <div class="form-group">
            <label>Isi</label>
            <textarea class="form-control" name="novel_isi" cols="30" rows="6" placeholder="Isi novel"></textarea>
        </div>
        <button class="btn btn-info float-right mb-5" style="background: #5caeea;"><i class="fas fa-upload"></i> Unggah</button>
    </form>
</div>

<div id="puisi" class="tabcontent mt-4">
    <form action="{{route('user.unggah.puisi')}}" method="post" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="anggota_id" value="{{Auth::user()->id}}">
        <div class="form-group">
            <label>Judul</label>
            <input class="form-control" type="text" name="puisi_judul" placeholder="Judul puisi" autocomplete="off">
        </div>
        <div class="form-group">
            <label>Karya</label>
            <input class="form-control" type="text" name="puisi_karya" placeholder="Karya" autocomplete="off">
        </div>
        <div class="form-group">
            <label>Gambar</label>
            <input class="form-control" type="file" name="puisi_gambar">
        </div>
        <div class="form-group">
            <textarea class="form-control" name="bait1" cols="30" rows="6" placeholder="Bait Satu"></textarea>
        </div>
        <div class="form-group">
            <textarea class="form-control" name="bait2" cols="30" rows="6" placeholder="Bait Dua"></textarea>
        </div>
        <div class="form-group">
            <textarea class="form-control" name="bait3" cols="30" rows="6" placeholder="Bait Tiga"></textarea>
        </div>
        <div class="form-group">
            <textarea class="form-control" name="bait4" cols="30" rows="6" placeholder="Bait Empat"></textarea>
        </div>
        <button class="btn btn-info float-right mb-5" style="background: #5caeea;"><i class="fas fa-upload"></i> Unggah</button>
    </form>
</div>

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
@stop