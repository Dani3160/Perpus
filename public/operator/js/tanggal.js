// Hari Bulan Tahun
var months = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];

var myDays = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jum&#39;at', 'Sabtu'];

var date = new Date();

var day = date.getDate();

var month = date.getMonth();

var thisDay = date.getDay(),

    thisDay = myDays[thisDay];

var yy = date.getYear();

var year = (yy < 1000) ? yy + 1900 : yy;

// Waktu
function waktu(){
    var waktu = new Date();
    setTimeout("waktu()",1000);
    document.getElementById("tanggal").innerHTML = thisDay + ', ' + day + ' ' + months[month] + ' ' + year + " " + waktu.getHours() + ":" + waktu.getMinutes() + ":" + waktu.getSeconds();
}

window.setTimeout("waktu()",1000);
        // document.getElementById("jam").innerHTML = tanggal.getHours();
        // document.getElementById("menit").innerHTML = tanggal.getMinutes();
        // document.getElementById("detik").innerHTML = tanggal.getSeconds();
    


	