<?php

namespace App\Http\Controllers\Operator\Pengaturan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\DataMaster\Anggota;
use Image;

class ProfileController extends Controller
{

   public function profile($id)
   {
   	  $anggota = Anggota::find($id);
   	  return view('operator.pengaturan.profile.index', compact('anggota'));
   }
   

   public function profileUpdate(Request $request, $id)
   {
   	 $anggota = Anggota::find($id);
   	 $anggota->anggota_nama = $request->anggota_nama; 
   	 $anggota->tanggal_lahir = $request->tanggal_lahir; 
   	 $anggota->alamat = $request->alamat; 
   	 $anggota->jenis_kelamin = $request->jenis_kelamin; 
   	 $anggota->telepon = $request->telepon; 
   	 $anggota->whatsapp = $request->whatsapp; 
   	 $anggota->facebook = $request->facebook; 
   	 $anggota->instagram = $request->instagram; 
   	 $anggota->posel = $request->posel; 
   	 $anggota->save();
   	 return redirect()->route('anggota.profile', $anggota->anggota_id);
   }


   public function fotoEdit($id)
   {
      $anggota = Anggota::find($id);
      return view('operator.pengaturan.profile.editFoto', compact('anggota'));
   }


   public function fotoUpdate(Request $request, $id)
   {
      if ( $request->hasFile('foto') ) {
         $foto = $request->file('foto');
         $fillename = time() . '.' . $foto->getClientOriginalExtension();
         Image::make($foto)->save(public_path('/images/profile/' . $fillename));

         $anggota = Anggota::find($id);
         $anggota->foto = $fillename;
         $anggota->save();
      }

       return view('operator.pengaturan.profile.index', compact('anggota'));
   }
}
