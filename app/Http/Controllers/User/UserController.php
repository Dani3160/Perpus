<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{
    
    public function index()
    {
        return view('user.dashboard');
    }

    public function unggahKarya()
    {
        return view('user.unggahkarya.index');
    }

    public function formNovel()
    {
        return view('user.unggahkarya.novel.index');
    }

    public function formCerpen()
    {
        return view('user.unggahkarya.cerpen.index');
    }

    public function formPuisi()
    {
        return view('user.unggahkarya.puisi.index');
    }

    public function novelPost(Request $request)
    {
        if ($id) {
            $novel = Novel::findOrFail($id);
        } else {
            $novel = New Novel;
        }
        $novel->novel_judul = $request->novel_judul;
        $novel->novel_karya = $request->novel_karya;
        $novel->novel_gambar = $request->novel_gambar;
        $novel->novel_isi = $request->novel_isi;
        $novel->konfirmasi = 1;
        $novel->anggota_id = $request->anggota_id;
        $novel->save();
        return redirect()->route('operator.novel')->with(['success' => 'Data Berhasil Di Simpan...']);
    }
    
}
