<?php
$wk = DB::table('cerpen')->first();

$cerpen = DB::table('cerpen')->where('cerpen_id', '=', $wk->cerpen_id)->get();


$a = 2;

$b = 1;

$c = $konfirmasi;

if($c== $a)
echo '<center><span class="badge badge-success badge-pill">Sudah dikonfirmasi</span></center>';
elseif($c ==  $b)
echo '<center><span class="badge badge-danger badge-pill">Belum dikonfirmasi</span></center>';
else
echo 'Tidak ada data!';

?>

