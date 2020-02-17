<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class UserController extends Controller
{
    
    // public function __construct()
    // {
    //     $this->middleware('auth');
    //     $this->middleware('IsUser');
    // }

    public function index()
    {
        return view('user.dashboard');
    }

    public function unggahKarya()
    {
        return view('user.unggahkarya.index');
    }

    // FORM KARYA

    public function formNovel()
    {
        return view('user.unggahkarya.novel.form');
    }

    public function formCerpen()
    {
        return view('user.unggahkarya.cerpen.form');
    }

    public function formPuisi()
    {
        return view('user.unggahkarya.puisi.form');
    }

    // POST KARYA

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
  
    public function cerpenPost(Request $request)
    {
        if ($id) {
            $cerpen = Cerpen::findOrFail($id);
        } else {
            $cerpen = New Cerpen;
        }
        $cerpen->cerpen_judul = $request->cerpen_judul;
        $cerpen->cerpen_karya = $request->cerpen_karya;
        $cerpen->cerpen_gambar = $request->cerpen_gambar;
        $cerpen->cerpen_isi = $request->cerpen_isi;
        $cerpen->konfirmasi = 1;
        $cerpen->anggota_id = $request->anggota_id;
        $cerpen->save();
    }
    
    public function puisiPost(Request $request)
    {
        if ($id) {
            $puisi = Puisi::findOrFail($id);
        } else {
            $puisi = New Puisi;
        }
        $puisi->puisi_judul = $request->puisi_judul;
        $puisi->puisi_karya = $request->puisi_karya;
        $puisi->puisi_gambar = $request->puisi_gambar;
        $puisi->bait1 = $request->bait1;
        $puisi->bait2 = $request->bait2;
        $puisi->bait3 = $request->bait3;
        $puisi->bait4 = $request->bait4;
        $puisi->konfirmasi = 1;
        $puisi->anggota_id = $request->anggota_id;
        $puisi->save();
    }

    // GET KARYA
    public function getKarya()
    {
        return view('user.unggahkarya.lihat');
    }

    public function getNovel()
    {
        $novel = DB::table('novel')
                    ->where('konfirmasi', '=', 2)
                    ->join('users', 'novel.anggota_id', 'users.anggota_id')
                    ->select('users.name', 'novel.*')
                    ->paginate(5);
        return view('user.unggahkarya.novel.index', compact('novel'));
    }

    public function getCerpen()
    {
        $cerpen = DB::table('cerpen')
                    ->where('konfirmasi', '=', 2)
                    ->join('users', 'cerpen.anggota_id', 'users.anggota_id')
                    ->select('users.name', 'cerpen.*')
                    ->paginate(5);
        return view('user.unggahkarya.cerpen.index', compact('cerpen'));
    }

    public function getPuisi()
    {
        $puisi = DB::table('puisi')
                    ->where('konfirmasi', '=', 2)
                    ->join('users', 'puisi.anggota_id', 'users.anggota_id')
                    ->select('users.name', 'puisi.*')
                    ->paginate(5);
        return view('user.unggahkarya.puisi.index', compact('puisi'));
    }

    // Lihat Buku
    public function lihatBuku()
    {
        // Hallo
    }
    
}
