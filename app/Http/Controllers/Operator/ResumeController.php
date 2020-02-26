<?php

namespace App\Http\Controllers\Operator;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use DB;
use App\Model\Resume;
use App\Model\DataPendukung\Kelas;
use App\Model\DataMaster\User;
use Yajra\Datatables\Datatables;

class ResumeController extends Controller
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
        $resume = Resume::all();
        $kelas = Kelas::all();
        return view('operator.resume.index', compact('resume', 'kelas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createDatatable()
    {
        $resume = DB::table('resume')
        ->join('users', 'resume.anggota_id', '=', 'users.id')
        ->join('kelas', 'resume.kelas_id', '=', 'kelas.kelas_id')
        ->select('resume.*',
            'users.name',
            'kelas.kelas_nama',
        )
        ->get();

        return Datatables::of($resume)
        ->addColumn('action', 'operator.resume.action')
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
        $id = $request->get('resume_id');
        if ($id) {
            $resume = Resume::findOrFail($id);
        } else {
            $resume = new Resume;
        }
        $resume->anggota_id = $request->anggota_id;
        $resume->kelas_id = $request->kelas_id;
        $resume->resume_judul = $request->resume_judul;
        $resume->resume_isi = $request->resume_isi;
        $resume->hari = $request->hari;
        $resume->tanggal_resume = $request->tanggal_resume;
        $resume->save();
        return redirect()->route('operator.resume')->with(['success' => 'Data Berhasil Di Simpan...']);
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

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $resume = Resume::find($id);
        $kelas = Kelas::all();
        $anggota = User::all();
        return view('operator.resume.edit', compact('anggota' ,'resume', 'kelas'));
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
        $resume = Resume::where('resume_id',$id)->delete();

		return redirect()->route('operator.resume');
    }
}
