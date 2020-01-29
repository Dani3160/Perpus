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
        $anggotaTipe = AnggotaTipe::all();
        $jurusan = Jurusan::all();
        $kelas = Kelas::all();
        return view('operator.datamaster.anggota.index', compact('jurusan', 'kelas', 'anggotaTipe'));
    }

    public function anggotaStore(Request $req)
    {
        $id = $req->get('anggota_id');
        if ($id) {
            $anggota = Anggota::findOrFail($id);
        } else {
            $anggota = New Anggota;
        }
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


    public function anggotaUbah($id) 
    {
        $anggota = Anggota::findOrFail($id);
        $anggotaTipe = AnggotaTipe::all();
        $jurusan = Jurusan::all();
        $kelas = Kelas::all();
    	return view('operator.datamaster.anggota.edit', compact('anggota', 'anggotaTipe', 'jurusan', 'kelas'));
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
        ->addColumn('action', 'operator.datamaster.anggota.action')
        ->addIndexColumn()
        ->make(true);
    }

    public function anggotaDelete($id)
    {
        $anggota = Anggota::where('anggota_id',$id)->delete();

		return redirect()->route('operator.anggota');
    }


}
