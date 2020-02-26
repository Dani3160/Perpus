<?php

namespace App\Http\Controllers\Operator\DataSirkulasi;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\DataSirkulasi\Sirkulasi;
use App\Model\DataPendukung\StatusSirkulasi;
use App\Model\DataMaster\User;
use App\Model\DataMaster\Biblio;
use App\Model\DataPendukung\Aturan;
use DB;
use Session;
use Carbon\Carbon;
use Yajra\Datatables\Datatables;

class SirkulasiController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('IsOperator');
    }
    
    // Peminjaman
    
    public function peminjaman()
    {
        // if(Session::get('login-pengguna')){
		// 	return redirect()->back();
		// }
		// if(Session::get('login-operator')){
		// 	return redirect()->back();
		// }
		// if(Session::get('login-admin')){
		// 	return redirect()->back();
		// }
        $anggota = User::all();
        $status = StatusSirkulasi::where('status_sirkulasi_nama', '=', 'Peminjaman')->get();
        $status2 = StatusSirkulasi::where('status_sirkulasi_nama', '=', 'Pengembalian')->get();
        $biblio = Biblio::where('status_item_id', 1)
        ->orderBy('judul', 'asc')
        ->take(10)
        ->get();
        return view('operator.datasirkulasi.peminjaman', ['anggota' => $anggota, 'biblio' => $biblio, 'status' => $status, 'status2' => $status2]);
    }
    
    public function peminjamanProses(Request $request)
    {
        $sirkulasi = new Sirkulasi;
        $sirkulasi->anggota_id = $request->get('anggota_id');
        $sirkulasi->biblio_id = $request->biblio_id;
        $mytime = Carbon::now();
        $mytime->toDateString();
        $sirkulasi->mulai_pinjam = $mytime;
        $aID = $sirkulasi->anggota_id;
        $anggota = User::find($aID);
        $aturan = Aturan::where('role', '=', 'Siswa')->first();
        $sirkulasi->aturan_id = $aturan->aturan_id;
        $sirkulasi->mulai_pinjam = $request->mulai_pinjam;
        $tgl = date('d', strtotime($sirkulasi->mulai_pinjam));
        $tgl2 = date('m', strtotime($sirkulasi->mulai_pinjam));
        if($tgl == 30){
            $tgl = date('d', strtotime($sirkulasi->mulai_pinjam)) - 30;
            $tgl2 = date('m') + 1;
        }elseif($tgl == 31){
            $tgl = date('d', strtotime($sirkulasi->mulai_pinjam)) - 31;
            $tgl2 = date('m') + 1;           
        }elseif($tgl == 26){
            if($aturan->periode == 7){
                $tgl = date('d', strtotime($sirkulasi->mulai_pinjam)) - 30;
                $tgl2 = date('m') + 1;
            }
        }elseif($tgl == 27){
            if($aturan->periode == 7){
                $tgl = date('d', strtotime($sirkulasi->mulai_pinjam)) - 30;
                $tgl2 = date('m') + 1;
            }
        }elseif($tgl == 28){
            if($aturan->periode == 7){
                $tgl = date('d', strtotime($sirkulasi->mulai_pinjam)) - 30;
                $tgl2 = date('m') + 1;
            }
        }elseif($tgl == 29){
            if($aturan->periode == 7){
                $tgl = date('d', strtotime($sirkulasi->mulai_pinjam)) - 30;
                $tgl2 = date('m') + 1;
            }
        }
        $b = $tgl  + $aturan->periode;
        $c = $tgl2;
        $sirkulasi->kembali_pinjam = date('Y-'.+$c. '-'.+$b);
        $sirkulasi->status_sirkulasi_id = $request->status_sirkulasi_id;
        $sirkulasi->save();

        $id = $sirkulasi->biblio_id;
        $biblio = Biblio::find($id);
        $b = DB::table('status_item')->where('status_item_nama', '=', 'Dipinjam')->get()->first();
        $biblio->status_item_id = $b->status_item_id;
        $biblio->save();
        return redirect()->route('operator.sirkulasi');
    }

    // Akhir Peminjaman
    
    // Search With Ajax

    public function searchAnggota(Request $request)
    {
        if ($request->has('q')) {
            $cari = $request->q;
            $data = DB::table('users')->select('id', 'name')->where('role', '=', 'Siswa', 'AND', 'name', 'LIKE', '%'.$cari.'%')->get();
            return response()->json($data);
        }
    }
    
    public function searchBiblio(Request $request)
    {
        if ($request->has('q')) {
            $cari = $request->q;
            $b = DB::table('status_item')->where('status_item_nama', '=', 'Tersedia')->first();
            $data = DB::table('biblio')->select('biblio_id', 'judul', 'eksemplar')->where('status_item_id', '=', $b->status_item_id, 'AND' , 'terhapus', '=', 1, 'AND' , 'judul', 'LIKE', '%'.$cari.'%')->get();
            return response()->json($data);
        }
    }
    
    public function searchBiblioBack(Request $request)
    {
        if ($request->has('q')) {
            $cari = $request->q;
            $b = DB::table('status_item')->where('status_item_nama', '=', 'Dipinjam')->first();
            $data = DB::table('biblio')->select('biblio_id', 'judul', 'eksemplar')->where('status_item_id', '=', $b->status_item_id, 'AND' ,'terhapus', '=', 1, 'AND' ,'judul', 'LIKE', '%'.$cari.'%')->get();
            return response()->json($data);
        }

    }

    // Akhir Search Ajax
   
    // Perpanjangan
    public function perpanjangan($id)
    {
        $perpanjangan = DB::table('sirkulasi')
        ->join('users', 'sirkulasi.anggota_id', '=', 'users.id')
        ->join('biblio', 'sirkulasi.biblio_id', '=', 'biblio.biblio_id')
        ->join('status_sirkulasi', 'sirkulasi.status_sirkulasi_id', '=', 'status_sirkulasi.status_sirkulasi_id')
        ->select('sirkulasi.*', 'users.name', 'users.id','biblio.judul', 'biblio.eksemplar', 'status_sirkulasi.status_sirkulasi_nama')
        ->where('sirkulasi_id', '=', $id)
        ->get()->first();
        
        return view('operator.datasirkulasi.perpanjangan.create', compact('perpanjangan'));
    }
    
    public function perpanjanganProses(Request $request, $id)
    {
        $sirkulasi = Sirkulasi::findOrFail($id);
        $sirkulasi->anggota_id = $request->anggota_id;
        $sirkulasi->biblio_id = $request->biblio_id;
        $mytime = Carbon::now();
        $mytime->toDateString();
        $sirkulasi->mulai_pinjam = $mytime;
        $sirkulasi->aturan_id = $request->aturan_id;
        $sirkulasi->mulai_pinjam = $request->mulai_pinjam;
        $sirkulasi->perpanjangan = $request->perpanjangan;
        $tgl2 = date('m', strtotime($sirkulasi->perpanjangan));
        $tgl3 = date('d', strtotime($sirkulasi->perpanjangan));
        $b = $tgl3;
        $c = $tgl2;
        $sirkulasi->kembali_pinjam = date('Y-'.+$c. '-'.+$b);
        $sirkulasi->status_sirkulasi_id = $request->status_sirkulasi_id;
        $sirkulasi->save();
        return redirect()->route('operator.sirkulasi');
    }

    // Akhir Perpanjangan
    
    // Pengembalian
    
    public function pengembalianProses(Request $request)
    {
        $sirkulasi = new Sirkulasi;
        $sirkulasi->anggota_id = $request->anggota_id;
        $sirkulasi->biblio_id = $request->biblio_id;
        $mytime = Carbon::now();
        $mytime->toDateString();
        $sirkulasi->kembali_pinjam = $mytime;
        $sirkulasi->kembali_pinjam = $request->kembali_pinjam;
        $aID = $sirkulasi->anggota_id;
        $anggota = User::find($aID);
        $aturan = Aturan::where('role', '=', 'Siswa')->first();
        $sirkulasi->aturan_id = $aturan->aturan_id;
        
        $tgl = date('d', strtotime($sirkulasi->kembali_pinjam));
        $tgl2 = date('m', strtotime($sirkulasi->kembali_pinjam));
        if($tgl == 1){
            $tgl = date('d', strtotime($sirkulasi->kembali_pinjam)) + 29;
            $tgl2 = date('m') - 1;
        }elseif($tgl == 2){
            $tgl = date('d', strtotime($sirkulasi->kembali_pinjam)) + 30;
            $tgl2 = date('m') - 1;
        }elseif($tgl == 3){
            $tgl = date('d', strtotime($sirkulasi->kembali_pinjam)) + 30;
            $tgl2 = date('m') - 1;
        }elseif($tgl == 4){
            if($aturan->periode == 7){
                $tgl = date('d', strtotime($sirkulasi->kembali_pinjam)) + 30;
                $tgl2 = date('m') - 1;
            }
        }elseif($tgl == 5){
            if($aturan->periode == 7){
                $tgl = date('d', strtotime($sirkulasi->kembali_pinjam)) + 30;
                $tgl2 = date('m') - 1;
            }
        }elseif($tgl == 6){
            if($aturan->periode == 7){
                $tgl = date('d', strtotime($sirkulasi->kembali_pinjam)) + 30;
                $tgl2 = date('m') - 1;
            }
        }elseif($tgl == 7){
            if($aturan->periode == 7){
                $tgl = date('d', strtotime($sirkulasi->kembali_pinjam)) + 30;
                $tgl2 = date('m') - 1;
            }
        }
        $b = $tgl  - $aturan->periode;
        $c = $tgl2;
        $sirkulasi->mulai_pinjam = date('Y-'.+$c. '-'.+$b);
        $sirkulasi->status_sirkulasi_id = $request->status_sirkulasi_id;
        $sirkulasi->save();
        $id = $sirkulasi->biblio_id;
        $biblio = Biblio::find($id);
        $b = DB::table('status_item')->where('status_item_nama', '=', 'Tersedia')->get()->first();
        $biblio->status_item_id = $b->status_item_id;
        $biblio->save();
        return redirect()->route('operator.sirkulasi');
    }

    // Akhir Pengembalian
    
    // Riwayat 

    // Datatable Peminjaman

    public function riwayatPeminjaman()
    {
        $status = DB::table('status_sirkulasi')->where('status_sirkulasi_nama', '=', 'Peminjaman')->get()->first();
        
        $peminjaman = DB::table('sirkulasi')
        ->join('users', 'sirkulasi.anggota_id', '=', 'users.id')
        ->join('biblio', 'sirkulasi.biblio_id', '=', 'biblio.biblio_id')
        ->select('sirkulasi.*', 'sirkulasi.sirkulasi_id', 'users.name', 'biblio.judul', 'biblio.eksemplar')
        ->where('status_sirkulasi_id', '=', $status->status_sirkulasi_id)
        ->orderBy('sirkulasi.sirkulasi_id', 'desc')
        ->get();
        

        return Datatables::of($peminjaman)
                            ->addColumn('Denda', 'operator.datasirkulasi.riwayat.denda')
                            ->addColumn('action', 'operator.datasirkulasi.riwayat.perpanjangan')
                            ->rawColumns(['Denda', 'action'])
                            ->addIndexColumn()
                            ->make(true);

    }

    // Datatable Pengembalian
    public function riwayatPengembalian()
    {
        $status = DB::table('status_sirkulasi')->where('status_sirkulasi_nama', '=', 'Pengembalian')->get()->first();
        $pengembalian = DB::table('sirkulasi')
        ->join('users', 'sirkulasi.anggota_id', '=', 'users.id')
        ->join('biblio', 'sirkulasi.biblio_id', '=', 'biblio.biblio_id')
        ->join('aturan', 'sirkulasi.aturan_id', '=', 'aturan.aturan_id')
        ->select('sirkulasi.*', 'users.name', 'biblio.judul', 'biblio.eksemplar', 'aturan.denda')
        ->where('status_sirkulasi_id', '=', $status->status_sirkulasi_id)
        ->orderBy('sirkulasi.sirkulasi_id', 'desc')
        ->get();

        return Datatables::of($pengembalian)->addIndexColumn()->make(true);
    }

    // Akhir Riwayat

    // Konfirmasi Pemesanan
    public function konfirmasi()
    {
        return view('operator.datasirkulasi.konfirmasi.konfirmasi');
    }

    public function konfirmasiDatatable()
    {
        $status = DB::table('status_sirkulasi')->where('status_sirkulasi_nama', '=', 'Konfirmasi')->get()->first();
        $konfirmasi = DB::table('sirkulasi')
        ->join('users', 'sirkulasi.anggota_id', '=', 'users.id')
        ->join('biblio', 'sirkulasi.biblio_id', '=', 'biblio.biblio_id')
        ->select('sirkulasi.*', 'users.name', 'biblio.judul', 'biblio.edisi', 'biblio.penerbit_tahun', 'biblio.eksemplar')
        ->where('status_sirkulasi_id', '=', $status->status_sirkulasi_id)
        ->orderBy('sirkulasi.sirkulasi_id', 'desc')
        ->get();

        return Datatables::of($konfirmasi)
                            ->addIndexColumn()
                            ->addColumn('aksi', 'operator.datasirkulasi.konfirmasi.aksi')
                            ->rawColumns(['aksi'])
                            ->make(true);
    }

    public function konfirmasiGet($id)
    {
        $konfirmasi = DB::table('sirkulasi')
        ->join('users', 'sirkulasi.anggota_id', '=', 'users.id')
        ->join('biblio', 'sirkulasi.biblio_id', '=', 'biblio.biblio_id')
        ->select('sirkulasi.*', 'users.name', 'biblio.judul', 'biblio.edisi', 'biblio.penerbit_tahun', 'biblio.eksemplar')
        ->where('sirkulasi_id', '=', $id)
        ->first();

        return view('operator.datasirkulasi.konfirmasi.edit', compact('konfirmasi'));
    }

    public function konfirmasiProses(Request $request, $id)
    {
        $sirkulasi = Sirkulasi::find($id);
        $sirkulasi->anggota_id = $request->anggota_id;
        $sirkulasi->biblio_id = $request->biblio_id;
        $aID = $sirkulasi->anggota_id;
        $anggota = Anggota::find($aID);
        $aturan = DB::table('aturan')->where('anggota_tipe_id', '=', $anggota->anggota_tipe_id)->get()->first();
        $sirkulasi->aturan_id = $aturan->aturan_id;
        $statusA = DB::table('status_sirkulasi')->where('status_sirkulasi_nama', '=', 'Riwayat Konfirmasi')->first();
        $sirkulasi->status_sirkulasi_id = $statusA->status_sirkulasi_id;
        $sirkulasi->save();
        $id = $sirkulasi->biblio_id;
        $biblio = Biblio::find($id);
        $status = DB::table('status_item')->where('status_item_nama', '=', 'Tidak Tersedia')->get()->first();
        $biblio->status_item_id = $status->status_item_id;
        $biblio->promosi = $request->promosi;
        $biblio->save();
        return redirect()->route('operator.riwayat.konfirmasi');
    }

    public function lihatKonfirmasi()
    {
        return view('operator.datasirkulasi.konfirmasi.riwayat');
    }

    public function riwayatKonfirmasi()
    {
        $status = DB::table('status_sirkulasi')->where('status_sirkulasi_nama', '=', 'Riwayat Konfirmasi')->get()->first();
        $konfirmasi = DB::table('sirkulasi')
        ->join('anggota', 'sirkulasi.anggota_id', '=', 'anggota.anggota_id')
        ->join('biblio', 'sirkulasi.biblio_id', '=', 'biblio.biblio_id')
        ->select('sirkulasi.*', 'anggota.anggota_nama', 'biblio.judul', 'biblio.edisi', 'biblio.penerbit_tahun', 'biblio.eksemplar')
        ->where('status_sirkulasi_id', '=', $status->status_sirkulasi_id)
        ->get();

        return Datatables::of($konfirmasi)->addIndexColumn()->make(true);
    }

    // Akhir Konfirmasi Pemesanan
    
}
