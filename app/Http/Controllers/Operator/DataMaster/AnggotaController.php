<?php

namespace App\Http\Controllers\Operator\DataMaster;

use DB;
use Image;
use Storage;
use Maatwebsite\Excel\Excel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\DataPendukung\Jurusan;
use App\Model\DataPendukung\Kelas;
use App\Model\DataMaster\User;
use Yajra\Datatables\Datatables;

class AnggotaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('IsOperator');
    }

    public function daftarAnggota()
    {
        $jurusan = Jurusan::all();
        $kelas = Kelas::all();
        return view('operator.datamaster.anggota.index', compact('jurusan', 'kelas'));
    }

    public function anggotaStore(Request $req)
    {
        $id = $req->get('id');
        if ($id) {
            $anggota = User::findOrFail($id);
        } else {
            $anggota = New User;
        }
        $anggota->name = $req->name;
        $anggota->jurusan_id = $req->jurusan_nama;
        $anggota->kelas_id = $req->kelas_nama;
        $anggota->email = $req->email;
        $anggota->role = $req->role;
        if ( $req->password === $req->password2 ) {
            $anggota->password = bcrypt($req->password);
            $anggota->save();
        }

        return redirect()->route('operator.anggota');
       
 
    }


    public function anggotaUbah($id) 
    {
        $anggota = User::find($id);
        $jurusan = Jurusan::all();
        $kelas = Kelas::all();
    	return view('operator.datamaster.anggota.edit', compact('anggota', 'jurusan', 'kelas'));
    }


    public function anggotaDatatable()
    {

        $anggota = DB::table('users')
        ->join('jurusan', 'users.jurusan_id', '=', 'jurusan.jurusan_id')
        ->join('kelas', 'users.kelas_id', '=', 'kelas.kelas_id')
        ->select('users.*',
            'jurusan.jurusan_nama',
            'kelas.kelas_nama'
        )
        ->get();

        return Datatables::of($anggota)
        ->addColumn('action', 'operator.datamaster.anggota.action')
        ->addIndexColumn()
        ->make(true);
    }

    public function anggotaDelete($id)
    {
        $anggota = User::where('id',$id)->delete();

		return redirect()->route('operator.anggota');
    }


}
