<?php

namespace App\Http\Controllers\Operator\Pengaturan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\DataPendukung\Pengaturan;

class SistemController extends Controller
{
   public function index($id)
   {
   	  $pengaturan = Pengaturan::find($id);
   	  return view('operator.pengaturan.sistem.index', compact('pengaturan'));
   }


   public function sistemUpdate(Request $request, $id)
   {
   	 $pengaturan = Pengaturan::find($id);
   	 $pengaturan->tentang_kami = $request->tentang_kami; 
   	 $pengaturan->tempat = $request->tempat; 
   	 $pengaturan->hak_cipta = $request->hak_cipta; 
   	 $pengaturan->save();
   	 return redirect()->route('operator.sistem', $pengaturan->pengaturan_id);
   }
}
