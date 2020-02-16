<?php
$wk = DB::table('novel')->first();

$novel = DB::table('novel')->where('novel_id', '=', $wk->novel_id)->get();


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

