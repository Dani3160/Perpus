<?php

namespace App\Http\Controllers\Operator\DataPendukung;

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

class AnggotaPendukungController extends Controller
{
    public function anggotaPendukung()
    {
    	return view('operator.datapendukung.anggota.index');
    }


    public function tipeAnggotaDataTable()
    {
    	$tipe = AnggotaTipe::all();
    	return Datatables::of($tipe)
        ->addColumn('action', 'operator.datapendukung.anggota.anggotatipe.action')
        ->addIndexColumn()
        ->make(true);
    }


    public function jurusanDataTable()
    {
    	$jurusan = Jurusan::all();
    	return Datatables::of($jurusan)
        ->addColumn('action', 'operator.datapendukung.anggota.jurusan.action')
        ->addIndexColumn()
        ->make(true);
    }



    public function kelasDatatable()
    {
    	$kelas = DB::table('kelas')
    				->join('jurusan', 'kelas.jurusan_id', '=', 'jurusan.jurusan_id')
    				->select('kelas.*',
    					'jurusan.jurusan_nama'
    				)->get();
    	return Datatables::of($kelas)
    	->addColumn('action', 'operator.datapendukung.anggota.kelas.action')
    	->addIndexColumn()
    	->make(true);
    }



    public function tambahDatapendukung()
    {
        $jurusan = Jurusan::all();
        return view('operator.datapendukung.anggota.tambah', compact('jurusan'));
    }

    public function ubahAnggotaTipe($id)
    {
        $anggotaTipe = AnggotaTipe::find($id);
        return view('operator.datapendukung.anggota.anggotatipe.edit', compact('anggotaTipe'));
    }

    public function ubahJurusan($id)
    {
        $jurusan = Jurusan::find($id);
        return view('operator.datapendukung.anggota.jurusan.edit', compact('jurusan'));
    }

    public function ubahKelas($id)
    {
        $kelas = Kelas::find($id);
        $jurusan = Jurusan::all();
        return view('operator.datapendukung.anggota.kelas.edit', compact('kelas', 'jurusan'));
    }

    public function storeDatapendukungTipe(Request $req)
    {
        $id = $req->get('anggota_tipe_id');

        if ( $id ) {
            $anggotaTipe = AnggotaTipe::find($id);
        }else {
            $anggotaTipe = new AnggotaTipe;
        }
        
        $anggotaTipe->anggota_tipe_nama = $req->anggota_tipe_nama;
        $anggotaTipe->save();

        return redirect()->route('anggota.datapendukung');
    }


    public function storeDatapendukungJurusan(Request $req)
    {
        $id = $req->get('jurusan_id');

        if ( $id ) {
            $jurusan = Jurusan::find($id);
        } else {
            $jurusan = new Jurusan;
        }

        $jurusan->jurusan_nama = $req->jurusan_nama;
        $jurusan->save();

        return redirect()->route('anggota.datapendukung');
    }


     public function storeDatapendukungKelas(Request $req)
    {
        $id = $req->get('kelas_id');

        if ( $id ) {
           $kelas = Kelas::find($id);
        }else {
            $kelas = new Kelas;
        }

        $kelas->kelas_nama = $req->kelas_nama;
        $kelas->jurusan_id = $req->jurusan_nama;
        $kelas->save();

        return redirect()->route('anggota.datapendukung');
    }

}
