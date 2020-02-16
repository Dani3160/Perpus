<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\DataPendukung\Jurusan;
use App\Model\DataPendukung\AnggotaTipe;
use DB;
use Session;
use Hash;
use App\Model\DataPendukung\Anggota;

class LoginController extends Controller
{
    public function ShowMasukForm(){
		return view ('Auth/Masuk');
	}
	public function getJurusan(Request $req){
		$kelas = DB::table('kelas')->where('jurusan_id', '=', $req->jurusan_id)->get();

		return json_encode($kelas);
	}

	public function Login(Request $req){

		$email = $req->email;
		$password = $req->password;

	}

}
