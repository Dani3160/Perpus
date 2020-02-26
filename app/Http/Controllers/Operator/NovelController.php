<?php

namespace App\Http\Controllers\Operator;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use DB;
use App\Model\Novel;
use App\Model\DataMaster\User;
use Yajra\Datatables\Datatables;

class NovelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('IsOperator');
    }

    public function index()
    {
        $novel = Novel::all();
        return view('operator.novel.index', compact('novel'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createDatatable()
    {
        $novel = DB::table('novel')
        ->join('users', 'novel.anggota_id', '=', 'users.id')
        ->select('novel.*',
            'users.name',
        )
        ->get();

        return Datatables::of($novel)
        ->addColumn('konfirmasi', 'operator.novel.konfirmasi')
        ->addColumn('action', 'operator.novel.action')
        ->rawColumns(['konfirmasi', 'action'])
        ->addIndexColumn()
        ->make(true);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $id = $request->get('novel_id');
        if ($id) {
            $novel = Novel::findOrFail($id);
        } else {
            $novel = New Novel;
        }
        $novel->novel_judul = $request->novel_judul;
        $novel->novel_karya = $request->novel_karya;
        $novel->novel_isi = $request->novel_isi;
        $novel->konfirmasi = $novel->konfirmasi;
        $novel->anggota_id = $request->anggota_id;
        $novel->save();
        return redirect()->route('operator.novel')->with(['success' => 'Data Berhasil Di Simpan...']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    public function konfirmasi(Request $request, $id)
    {
        $konfirmasi = 2;
        $novel = Novel::findOrFail($id);
        $novel->konfirmasi = $konfirmasi;
        $novel->save();
        return redirect()->route('operator.novel')->with(['success' => 'Data Berhasil Di Hapus...']);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $novel = Novel::find($id);
        $anggota = User::all();
        return view('operator.novel.edit', compact('novel', 'anggota'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $novel = Novel::where('novel_id',$id)->delete();

		return redirect()->route('operator.novel');
    }
}
