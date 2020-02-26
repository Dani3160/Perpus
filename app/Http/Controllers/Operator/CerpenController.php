<?php

namespace App\Http\Controllers\Operator;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use DB;
use App\Cerpen;
use App\Model\DataMaster\User;
use Yajra\Datatables\Datatables;


class CerpenController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('IsOperator');
    }

    public function index()
    {
        $cerpen = Cerpen::all();
        return view('operator.cerpen.index', compact('cerpen'));
    }

    public function createDatatable()
    {
        $cerpen = DB::table('cerpen')
        ->join('users', 'cerpen.anggota_id', '=', 'users.id')
        ->select('cerpen.*',
            'users.name',
        )
        ->get();

        return Datatables::of($cerpen)
        ->addColumn('konfirmasi', 'operator.cerpen.konfirmasi')
        ->addColumn('action', 'operator.cerpen.action')
        ->rawColumns(['konfirmasi', 'action'])
        ->addIndexColumn()
        ->make(true);
    }

    public function store(Request $request)
    {
        $id = $request->get('cerpen_id');
        if ($id) {
            $cerpen = Cerpen::findOrFail($id);
        } else {
            $cerpen = New Cerpen;
        }
        $cerpen->cerpen_judul = $request->cerpen_judul;
        $cerpen->cerpen_karya = $request->cerpen_karya;
        $cerpen->cerpen_isi = $request->cerpen_isi;
        $cerpen->konfirmasi = $cerpen->konfirmasi;
        $cerpen->anggota_id = $request->anggota_id;
        $cerpen->save();
        return redirect()->route('operator.cerpen')->with(['success' => 'Data Berhasil Di Simpan...']);
    }

    public function konfirmasi(Request $request, $id)
    {
        $konfirmasi = 2;
        $cerpen = Cerpen::findOrFail($id);
        $cerpen->konfirmasi = $konfirmasi;
        $cerpen->save();
        return redirect()->route('operator.cerpen')->with(['success' => 'Data Berhasil Di Hapus...']);
    }

    public function edit($id)
    {
        $cerpen = Cerpen::find($id);
        $anggota = User::all();
        return view('operator.cerpen.edit', compact('cerpen', 'anggota'));
    }

    public function destroy($id)
    {
        $cerpen = Cerpen::where('cerpen_id',$id)->delete();

		return redirect()->route('operator.cerpen');
    }
}
