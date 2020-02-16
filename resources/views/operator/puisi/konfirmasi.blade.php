<?php
$wk = DB::table('puisi')->first();

$puisi = DB::table('puisi')->where('puisi_id', '=', $wk->puisi_id)->get();


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

