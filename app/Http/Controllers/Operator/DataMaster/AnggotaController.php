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
use App\Model\DataPendukung\AnggotaTipe;
use App\Model\DataMaster\Anggota;
use Yajra\Datatables\Datatables;

class AnggotaController extends Controller
{


    public function daftarAnggota()
    {
        return view('operator.datamaster.anggota.index');
    }


     public function anggotaTambah()
    {
        $anggotaTipe = AnggotaTipe::all();
        $jurusan = Jurusan::all();
        $kelas = Kelas::all();
    	return view('operator.datamaster.anggota.tambah', compact('jurusan', 'kelas', 'anggotaTipe'));
    }


    public function anggotaStore(Request $req)
    {
        $anggota = new Anggota;
        $anggota->anggota_nama = $req->anggota_nama;
        $anggota->anggota_tipe_id = $req->anggota_tipe;
        $anggota->jurusan_id = $req->jurusan_nama;
        $anggota->kelas_id = $req->kelas_nama;
        $anggota->posel = $req->posel;
        if ( $req->password === $req->password2 ) {
            $anggota->katasandi = bcrypt($req->password);
            $anggota->save();
        }

        return redirect()->route('operator.anggota');
       
 
    }


    public function anggotaUbah() 
    {
    	return view('operator.datamaster.anggota.edit');
    }


    public function anggotaDatatable()
    {

        $anggota = DB::table('anggota')
        ->join('anggota_tipe', 'anggota.anggota_tipe_id', '=', 'anggota_tipe.anggota_tipe_id')
        ->join('jurusan', 'anggota.jurusan_id', '=', 'jurusan.jurusan_id')
        ->join('kelas', 'anggota.kelas_id', '=', 'kelas.kelas_id')
        ->select('anggota.*',
            'anggota_tipe.anggota_tipe_nama',
            'jurusan.jurusan_nama',
            'kelas.kelas_nama'
        )
        ->get();

        return Datatables::of($anggota)
        ->addColumn('action', 'admin.anggota.action')
        ->addIndexColumn()
        ->make(true);
    }


}
