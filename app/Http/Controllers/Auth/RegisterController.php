<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\DataPendukung\Anggota;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use App\Model\DataPendukung\Jurusan;
use App\Model\DataPendukung\AnggotaTipe;
use DB;

class RegisterController extends Controller
{
    public function ShowDaftarForm(){
        if(Session::get('login-pengguna')){
            return redirect()->back();
        }
        if(Session::get('login-operator')){
            return redirect()->back();
        }
        if(Session::get('login-admin')){
            return redirect()->back();
        }
        $jurusan = Jurusan::all();
        $AnggotaTipe = AnggotaTipe::all();

        return view ('Auth/Daftar', ['jurusan'=>$jurusan, 'AnggotaTipe'=>$AnggotaTipe]);
    }


    public function Register(Request $req){

        $message = [
            'required' => 'Form ini harus di isi',
            'min' => 'jumlah karakter kurang atau lebih',
            'unique' => 'posel atau email telah digunakan',
            'same' => 'konfirmasi kata sandi dengan kata sandi harus saman'
        ];

        $this->validate($req, [

            'anggota_nama' => 'required|min:2|max:30',
            'posel' => 'required|min:4|unique:anggota,posel',
            'telepon' => 'required|min:11|max:13',
            'anggota_tipe_id' => 'required',
            'jurusan_id' => 'required',
            'kelas_id' => 'required',
            'katasandi' => 'required',
            'konfirmasi_katasandi' => 'required|same:katasandi',

        ], $message);

        $r = new Anggota;
        $r->anggota_nama = $req->anggota_nama;
        $r->posel = $req->posel;
        $r->telepon = $req->telepon;
        $r->anggota_tipe_id = $req->anggota_tipe_id;
        $jurusan = DB::table('jurusan')->where('jurusan_nama', '=', 'Tidak Ada')->first();
        $r->jurusan_id = $jurusan->jurusan_id;
        $kelas = DB::table('kelas')->where('kelas_nama', '=', 'Tidak Ada')->first();
        $r->kelas_id = $kelas->kelas_id;
        $r->katasandi = bcrypt($req->katasandi);
        $r->status_anggota = 0;
        $r->save();

        Session::put('anggota_nama', $r->anggota_nama);
        Session::put('posel', $r->posel);
        Session::put('telepon', $r->telepon);
        Session::put('login', true);

        return redirect()->route('dasbor-pengguna');

    }
}
