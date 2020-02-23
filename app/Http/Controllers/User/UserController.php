<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\DataMaster\User;
use App\Model\Resume;
use App\Cerpen;
use App\Model\Novel;
use App\Puisi;
use DB;
use Auth;

class UserController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('user.dashboard');
    }

    // Profile
    public function profile()
    {
        $provinsi = DB::table('provinsi')->get();
        $kabupaten = DB::table('kabupaten')->get();
        $kecamatan = DB::table('kecamatan')->get();
        $desa = DB::table('desa')->get();
        $jurusan = DB::table('jurusan')->get();
        $kelas = DB::table('kelas')->get();

        $profile = DB::table('users')->where('id', '=', Auth::user()->id)->first();
        return view('user.profile.index', compact('profile', 'provinsi', 'kabupaten', 'kecamatan', 'desa', 'jurusan', 'kelas'));
    }

    public function profilePost(Request $req)
    {
        $id = $req->get('id');
        if ($id) {
            $profile = User::findOrFail($id);
        } else {
            $profile = New User;
        }
        $profile->name = $req->name;
        $profile->email = $req->email;
        $profile->jenis_kelamin = $req->jenis_kelamin;
        $profile->tanggal_lahir = $req->tanggal_lahir;
        $profile->alamat = $req->alamat;
        $profile->kode_pos = $req->kode_pos;
        $profile->telepon = $req->telepon;
        $profile->whatsapp = $req->whatsapp;
        $profile->facebook = $req->facebook;
        $profile->instagram = $req->instagram;
        $profile->provinsi_id = $req->provinsi_id;
        $profile->kabupaten_id = $req->kabupaten_id;
        $profile->kecamatan_id = $req->kecamatan_id;
        $profile->desa_id = $req->desa_id;
        $profile->jurusan_id = $req->jurusan_id;
        $profile->kelas_id = $req->kelas_id;
        $profile->save();
        return redirect()->back();
    }

    public function unggahKarya()
    {
        return view('user.unggahkarya.index');
    }


    // POST KARYA

    public function novelPost(Request $request)
    {
        $novel = New Novel;
        
        $novel->novel_judul = $request->novel_judul;
        $novel->novel_karya = $request->novel_karya;
        // $novel->novel_gambar = $request->novel_gambar;
        $novel->novel_isi = $request->novel_isi;
        $novel->konfirmasi = 1;
        $novel->anggota_id = $request->anggota_id;
        $novel->save();
        return redirect()->back();
    }
  
    public function cerpenPost(Request $request)
    {
        $cerpen = New Cerpen;
        
        $cerpen->cerpen_judul = $request->cerpen_judul;
        $cerpen->cerpen_karya = $request->cerpen_karya;
        // $cerpen->cerpen_gambar = $request->cerpen_gambar;
        $cerpen->cerpen_isi = $request->cerpen_isi;
        $cerpen->konfirmasi = 1;
        $cerpen->anggota_id = $request->anggota_id;
        $cerpen->save();
        return redirect()->back();
    }
    
    public function puisiPost(Request $request)
    {
        $puisi = New Puisi;
       
        $puisi->puisi_judul = $request->puisi_judul;
        $puisi->puisi_karya = $request->puisi_karya;
        // $puisi->puisi_gambar = $request->puisi_gambar;
        $puisi->bait1 = $request->bait1;
        $puisi->bait2 = $request->bait2;
        $puisi->bait3 = $request->bait3;
        $puisi->bait4 = $request->bait4;
        $puisi->konfirmasi = 1;
        $puisi->anggota_id = $request->anggota_id;
        $puisi->save();
        return redirect()->back();
    }

    // GET KARYA
    public function getKarya()
    {
        return view('user.unggahkarya.lihat');
    }

    // Novel
    public function getNovel()
    {
        $novel = DB::table('novel')
                    ->where('konfirmasi', '=', 2)
                    ->join('users', 'novel.anggota_id', 'users.id')
                    ->select('users.name', 'novel.*')
                    ->paginate(5);
        return view('user.unggahkarya.novel.index', compact('novel'));
    }

    public function bacaNovel($id)
    {
        $novel = DB::table('novel')->where('novel_id', '=', $id)->first();
        return view('user.unggahkarya.novel.baca', compact('novel'));
    }

    public function getCerpen()
    {
        $cerpen = DB::table('cerpen')
                    ->where('konfirmasi', '=', 2)
                    ->join('users', 'cerpen.anggota_id', 'users.id')
                    ->select('users.name', 'cerpen.*')
                    ->paginate(5);
        return view('user.unggahkarya.cerpen.index', compact('cerpen'));
    }

    public function bacaCerpen($id)
    {
        $cerpen = DB::table('cerpen')->where('cerpen_id', '=', $id)->first();
        return view('user.unggahkarya.cerpen.baca', compact('cerpen'));
    }

    public function getPuisi()
    {
        $puisi = DB::table('puisi')
                    ->where('konfirmasi', '=', 2)
                    ->join('users', 'puisi.anggota_id', 'users.id')
                    ->select('users.name', 'puisi.*')
                    ->paginate(5);
        return view('user.unggahkarya.puisi.index', compact('puisi'));
    }

    public function bacaPuisi($id)
    {
        $puisi = DB::table('puisi')->where('puisi_id', '=', $id)->first();
        return view('user.unggahkarya.puisi.baca', compact('puisi'));
    }

    // Akhir karya

    // Lihat Buku
    public function lihatBuku()
    {
        $klasifikasi = DB::table('klasifikasi')->get();
        return view('user.lihatbuku.index', compact('klasifikasi'));
    }

    public function getBuku(Request $req)
    {
        $id = $req->get('klasifikasi_id');

        if($id)
        {
            $klasifikasi = DB::table('klasifikasi')->where('klasifikasi', '=' ,$id)->first();
    		$buku = DB::table('biblio')->with('klasifikasi')->where('promosi', '=', 1)->where('klasifikasi', '=', $id)->paginate(8);
        }else{
            $buku = DB::table('biblio')->get();
        }
        
        return view('user.lihatbuku.buku', compact('buku'));
    }

    // Akhir Lihat Buku

    // Resume Literasi
    public function literasi()
    {
        $user = DB::table('users')->where('id', '=', Auth::user()->id)->first();
        
        $resume = DB::table('resume')
                    ->where('anggota_id', '=', $user->id)
                    ->join('users', 'resume.anggota_id', 'users.id')
                    ->select('resume.*', 'users.name')
                    ->paginate(5);

        return view('user.literasi.index', compact('resume'));
    }

    public function detailLiterasi($id)
    {
        
        $resume = DB::table('resume')
        ->where('resume_id', '=', $id)
        ->join('users', 'resume.anggota_id', 'users.id')
        ->select('resume.*', 'users.name')
        ->first();

        return view('user.literasi.detail', compact('resume'));
    }

    public function formLiterasi()
    {
        return view('user.literasi.form');
    }

    public function postLiterasi(Request $req)
    {
        $resume = new Resume;
        $resume->anggota_id = $req->anggota_id;
        $resume->kelas_id = $req->kelas_id;
        $resume->hari = $req->hari;
        $resume->tanggal_resume = $req->tanggal_resume;
        $resume->resume_judul = $req->resume_judul;
        $resume->resume_isi = $req->resume_isi;
        $resume->save();
        return redirect()->route('user.literasi')->with(['success' => 'Data Berhasil Di Simpan...']);
    }
    // Akhir literasi
}
