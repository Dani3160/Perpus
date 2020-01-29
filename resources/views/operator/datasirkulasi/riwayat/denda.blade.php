<?php
use Carbon\Carbon;

$wk = DB::table('sirkulasi')->first();

$sirkulasi = DB::table('sirkulasi')->where('sirkulasi_id', '=', $wk->sirkulasi_id)->get();

$now = Carbon::now()->format('Y'.'m'.'d'); 
$now2 = strtotime($now);

foreach($sirkulasi as $s){
    $b = $s->kembali_pinjam;
    $b2 = strtotime($b);
}


$a = $kembali_pinjam;
$a2 = strtotime($a);
?>

<?php
if($now2 < $a2 )
echo '<span class="badge badge-success badge-pill">aman</span>';
elseif($now2 > $a2)
echo '<span class="badge badge-danger badge-pill">didenda</span>';
elseif($now2 === $a2)
echo '<span class="badge badge-warning badge-pill">tglkembali</span>';
else
echo "Tidak ada data";
?>

