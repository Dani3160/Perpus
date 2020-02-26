<?php

namespace App\Http\Controllers\Operator;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use DB;
use App\Puisi;
use App\Model\DataMaster\User;
use Yajra\Datatables\Datatables;


class PuisiController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('IsOperator');
    }

    public function index()
    {
        $puisi = Puisi::all();
        return view('operator.puisi.index', compact('puisi'));
    }

    public function createDatatable()
    {
        $puisi = DB::table('puisi')
        ->join('users', 'puisi.anggota_id', '=', 'users.id')
        ->select('puisi.*',
            'users.name',
        )
        ->get();

        return Datatables::of($puisi)
        ->addColumn('konfirmasi', 'operator.puisi.konfirmasi')
        ->addColumn('action', 'operator.puisi.action')
        ->rawColumns(['konfirmasi', 'action'])
        ->addIndexColumn()
        ->make(true);
    }

    public function store(Request $request)
    {
        $id = $request->get('puisi_id');
        if ($id) {
            $puisi = Puisi::findOrFail($id);
        } else {
            $puisi = New Puisi;
        }
        $puisi->puisi_judul = $request->puisi_judul;
        $puisi->puisi_karya = $request->puisi_karya;
        $puisi->puisi_isi = $request->puisi_isi;
        $puisi->konfirmasi = $puisi->konfirmasi;
        $puisi->anggota_id = $request->anggota_id;
        $puisi->save();
        return redirect()->route('operator.puisi')->with(['success' => 'Data Berhasil Di Simpan...']);
    }

    public function konfirmasi(Request $request, $id)
    {
        $konfirmasi = 2;
        $puisi = Puisi::findOrFail($id);
        $puisi->konfirmasi = $konfirmasi;
        $puisi->save();
        return redirect()->route('operator.puisi')->with(['success' => 'Data Berhasil Di Hapus...']);
    }

    public function edit($id)
    {
        $puisi = Puisi::find($id);
        $anggota = User::all();
        return view('operator.puisi.edit', compact('puisi', 'anggota'));
    }

    public function destroy($id)
    {
        $puisi = Puisi::where('puisi_id',$id)->delete();

		return redirect()->route('operator.puisi');
    }
}
