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
		return view ('Auth/Masuk', ['jurusan'=>$jurusan, 'AnggotaTipe'=>$AnggotaTipe]);
	}
	public function getJurusan(Request $req){
		$kelas = DB::table('kelas')->where('jurusan_id', '=', $req->jurusan_id)->get();

		return json_encode($kelas);
	}

	public function Login(Request $req){

		$posel = $req->posel;
		$katasandi = $req->katasandi;

		$data = Anggota::where('posel', $posel)->first();
		if($data) {
			if(Hash::check($katasandi, $data->katasandi)){
				Session::put('anggota_nama', $data->anggota_nama);
				Session::put('posel', $data->posel);
				Session::put('telepon', $data->telepon);

				$logic = AnggotaTipe::where('anggota_tipe_id', $data->anggota_tipe_id)->first();

				if($data->anggota_tipe_id == $logic->anggota_tipe_id && $logic->anggota_tipe_nama == 'Siswa'){
					Session::put('login-pengguna', true);
					return redirect()->route('dasbor-pengguna');
				}
				if($data->anggota_tipe_id == $logic->anggota_tipe_id && $logic->anggota_tipe_nama == 'Guru'){
					Session::put('login-pengguna', true);
					return redirect()->route('dasbor-pengguna');
				}
				if($data->anggota_tipe_id == $logic->anggota_tipe_id && $logic->anggota_tipe_nama == 'Operator'){
					Session::put('login-operator', true);
					return redirect()->route('operator.dashboard');
				}
				if($data->anggota_tipe_id == $logic->anggota_tipe_id && $logic->anggota_tipe_nama == 'Admin'){
					Session::put('login-admin', true);
					return redirect()->route('dasbor-admin');
				}
				
			}
			else {
				return redirect('Masuk')->with('alert-failed','Password atau Email, Salah !');
			}
		}
		else {
			return redirect('Masuk')->with('alert-failed','Password atau Email, Salah !');
		}
	}

	public function Keluar(){
		Session::flush();
		return redirect('Masuk')->with('alert','Kamu sudah logout');
	}
}
