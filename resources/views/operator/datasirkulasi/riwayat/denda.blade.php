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
echo '<button class="btn btn-success"></button>';
elseif($now2 > $a2)
echo '<button class="btn btn-danger"></button>';
elseif($now2 === $a2)
echo '<button class="btn btn-warning"></button>';
else
echo "Tidak ada data";
?>

