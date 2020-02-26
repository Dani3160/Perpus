<?php

namespace App\Http\Controllers\Operator\DataPendukung;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Model\DataPendukung\Penulis;
use App\Model\DataPendukung\Penerbit;
use App\Model\DataPendukung\StatusItem;
use App\Model\DataPendukung\SumberItem;
use App\Model\DataPendukung\Klasifikasi;
use App\Model\DataPendukung\TipeKoleksi;
use App\Model\DataPendukung\StatusSirkulasi;

use Maatwebsite\Excel\Facades\Excel;
use Yajra\Datatables\Datatables;
use DB;

class BiblioPendukungController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('IsOperator');
    }

    public function index()
    {
    	return view('operator.datapendukung.biblio.index');
    }
    // Datatables
	    public function penulisdatatable()
	    {
	    	$penulis = DB::table('penulis')
	    				->where('terhapus', '=', '1')
	    				->get();
	    	return Datatables::of($penulis)
	    			->addColumn('action', 'operator.datapendukung.biblio.penulis.action')
					->addIndexColumn()
	    			->make(true);
	    }
		
		public function penerbitdatatable()
	    {
	    	$penerbit = DB::table('penerbit')
	    				->where('terhapus', '=', '1')
	    				->get();
	    	return Datatables::of($penerbit)
	    			->addColumn('action', 'operator.datapendukung.biblio.penerbit.action')
	    			->addIndexColumn()
	    			->make(true);
	    }
		
		public function klasifikasidatatable()
	    {
	    	$klasifikasi = DB::table('klasifikasi')
	    					->where('terhapus', '=', '1')
	    					->get();
	    	return Datatables::of($klasifikasi)
	    			->addColumn('action', 'operator.datapendukung.biblio.klasifikasi.action')
	    			->addIndexColumn()
	    			->make(true);
	    }
		
		public function statusitemdatatable()
	    {
	    	$statusitem = DB::table('status_item')
	    					->where('terhapus', '=', '1')
	    					->get();
	    	return Datatables::of($statusitem)
	    			->addColumn('action', 'operator.datapendukung.biblio.statusitem.action')
	    			->addIndexColumn()
	    			->make(true);
	    }
		
		public function sumberitemdatatable()
	    {
	    	$sumberitem = DB::table('sumber_item')
	    					->where('terhapus', '=', '1')
	    					->get();
	    	return Datatables::of($sumberitem)
	    			->addColumn('action', 'operator.datapendukung.biblio.sumberitem.action')
	    			->addIndexColumn()
	    			->make(true);
	    }
		
		public function tipekoleksidatatable()
	    {
	    	$tipekoleksi = DB::table('tipekoleksi')
	    					->where('terhapus', '=', '1')
	    					->get();
	    	return Datatables::of($tipekoleksi)
	    			->addColumn('action', 'operator.datapendukung.biblio.tipekoleksi.action')
	    			->addIndexColumn()
	    			->make(true);
	    }
		
		public function statussirkulasidatatable()
	    {
	    	$statussirkulasi = DB::table('status_sirkulasi')
	    						->where('terhapus', '=', '1')
	    						->get();
	    	return Datatables::of($statussirkulasi)
	    			->addColumn('action', 'operator.datapendukung.biblio.statussirkulasi.action')
	    			->addIndexColumn()
	    			->make(true); 
	    }

	 // Proses insert dan update
	    public function storePenulis(Request $request)
	    {
	    	$id = $request->get('penulis_id');
	    	$hapus = 1;
	    	if ($id) 
	    	{
	    		$penulis = Penulis::findOrFail($id);
	    	} else {
	    		$penulis = New Penulis;
	    		$penulis->terhapus = $hapus;
	    	}
	    	$penulis->penulis_nama = $request->penulis_nama;
	    	$penulis->save();
	    	return redirect()->route('operator.pendukung.biblio')->with(['success' => 'Data Berhasil Di Simpan...']);
	    }
		
		public function storePenerbit(Request $request)
	    {
	    	$id = $request->get('penerbit_id');
	    	$hapus = 1;
	    	if ($id) {
	    		$penerbit = Penerbit::findOrFail($id);
	    	} else {
	    		$penerbit = New Penerbit;
	    		$penerbit->terhapus = $hapus;
	    	}
	    	$penerbit->penerbit_nama = $request->penerbit_nama;
	    	$penerbit->save();
	    	return redirect()->route('operator.pendukung.biblio')->with(['success' => 'Data Berhasil Di Simpan...']);
	    }
		
		public function storeKlasifikasi(Request $request)
	    {
	    	$id = $request->get('klasifikasi_id');
	    	$hapus = 1;
	    	if ($id) {
	    		$klasifikasi = Klasifikasi::findOrFail($id);
	    	} else {
	    		$klasifikasi = New Klasifikasi;
	    		$klasifikasi->terhapus = $hapus;
	    	}
	    	$klasifikasi->klasifikasi_nama = $request->klasifikasi_nama;
	    	$klasifikasi->save();
	    	return redirect()->route('operator.pendukung.biblio')->with(['success' => 'Data Berhasil Di Simpan...']);
	    }
		
		public function storeTipekoleksi(Request $request)
	    {
	    	$id = $request->get('tipekoleksi_id');
	    	$hapus = 1;
	    	if ($id) {
	    		$tipekoleksi = TipeKoleksi::findOrFail($id);
	    	} else {
	    		$tipekoleksi = New TipeKoleksi;
	    		$tipekoleksi->terhapus = $hapus;
	    	}
	    	$tipekoleksi->tipekoleksi_nama = $request->tipekoleksi_nama;
	    	$tipekoleksi->save();
	    	return redirect()->route('operator.pendukung.biblio')->with(['success' => 'Data Berhasil Di Simpan...']);
	    } 
		
		public function storeSumberitem(Request $request) 
	    {
	    	$id = $request->get('sumber_item_id');
	    	$hapus = 1;
	    	if ($id) {
	    		$sumberitem = SumberItem::findOrFail($id);
	    	} else {
	    		$sumberitem = New SumberItem;
	    		$sumberitem->terhapus = $hapus;
	    	} 
	    	$sumberitem->sumber_item_nama = $request->sumber_item_nama;
	    	$sumberitem->save();
	    	return redirect()->route('operator.pendukung.biblio')->with(['success' => 'Data Berhasil Di Simpan...']);
	    }
		
		public function storeStatusitem(Request $request)
	    {
	    	$id = $request->get('status_item_id');
	    	$hapus = 1;
	    	if ($id) {
	    		$statusitem = StatusItem::findOrFail($id);
	    	} else {
	    		$statusitem = New StatusItem;
	    		$statusitem->terhapus = $hapus;
	    	}
	    	$statusitem->status_item_nama = $request->status_item_nama;
	    	$statusitem->save();
	    	return redirect()->route('operator.pendukung.biblio')->with(['success' => 'Data Berhasil Di Simpan...']);
	    }
		
		public function storeStatussirkulasi(Request $request)
	    {
	    	$id = $request->get('status_sirkulasi_id');
	    	$hapus = 1;
	    	if ($id) {
	    		$statussirkulasi = StatusSirkulasi::findOrFail($id);
	    	} else {
	    		$statussirkulasi = New StatusSirkulasi;
	    		$statussirkulasi->terhapus = $hapus;
	    	}
	    	$statussirkulasi->status_sirkulasi_nama = $request->status_sirkulasi_nama;
	    	$statussirkulasi->save();
	    	return redirect()->route('operator.pendukung.biblio')->with(['success' => 'Data Berhasil Di Simpan...']);
	    }

	// Edit Data
	    public function editPenulis($id)
	    {
	    	$penulis = Penulis::findOrFail($id);
	    	return view('operator.datapendukung.biblio.penulis.edit', compact('penulis'));
	    }
		
		public function editPenerbit($id)
	    {
	    	$penerbit = Penerbit::findOrFail($id);
	    	return view('operator.datapendukung.biblio.penerbit.edit', compact('penerbit'));
	    }
		
		public function editKlasifikasi($id)
	    {
	    	$klasifikasi = Klasifikasi::findOrFail($id);
	    	return view('operator.datapendukung.biblio.klasifikasi.edit', compact('klasifikasi'));
	    }
		
		public function editStatusitem($id)
	    {
	    	$statusitem = StatusItem::findOrFail($id);
	    	return view('operator.datapendukung.biblio.statusitem.edit', compact('statusitem'));
	    }
		
		public function editSumberitem($id)
	    {
	    	$sumberitem = SumberItem::findOrFail($id);
	    	return view('operator.datapendukung.biblio.sumberitem.edit', compact('sumberitem'));
	    }
		
		public function editTipekoleksi($id)
	    {
	    	$tipekoleksi = TipeKoleksi::findOrFail($id);
	    	return view('operator.datapendukung.biblio.tipekoleksi.edit', compact('tipekoleksi'));
	    } 
		
		public function editStatussirkulasi($id)
	    {
	    	$statussirkulasi = StatusSirkulasi::findOrFail($id);
	    	return view('operator.datapendukung.biblio.statussirkulasi.edit', compact('statussirkulasi'));
		}
		
		 //Import Excel
	    public function importKlasifikasi()
	    {
	    	return view('operator.datapendukung.biblio.klasifikasi.import');
	    }
	
		//Datatable
		public function penulisRiwayatData()
		{
			$penulis = DB::table('penulis')
						->where('terhapus', '=', '2')
						->get();
			return Datatables::of($penulis)
					->addIndexColumn()
					->make(true);
		}
		public function penerbitRiwayatData()
		{
			$penerbit = DB::table('penerbit')
						->where('terhapus', '=', '2')
						->get();
			return Datatables::of($penerbit)
	    			->addIndexColumn()
	    			->make(true);
		} 
		public function statusitemRiwayatData()
		{
			$statusitem = DB::table('status_item')
							->where('terhapus', '=', '2')
							->get();
			return Datatables::of($statusitem)
					->addIndexColumn()
					->make(true);
		}
		public function sumberitemRiwayatData()
		{
			$sumberitem = DB::table('sumber_item')
							->where('terhapus', '=', '2')
							->get();
			return Datatables::of($sumberitem)
					->addIndexColumn()
					->make(true);
		}
		public function klasifikasiRiwayatData()
		{
			$klasifikasi = DB::table('klasifikasi')
							->where('terhapus', '=', '2')
							->get();
			return Datatables::of($klasifikasi)
					->addIndexColumn()
					->make(true);
		}
		public function tipekoleksiRiwayatData()
		{
			$tipekoleksi = DB::table('tipekoleksi')
							->where('terhapus', '=', '2')
							->get();
			return Datatables::of($tipekoleksi)
					->addIndexColumn()
					->make(true);
		}
		public function statussirkulasiRiwayatData()
		{
			$statussirkulasi = DB::table('status_sirkulasi')
								->where('terhapus', '=', '2')
								->get();
			return Datatables::of($statussirkulasi)
					->addIndexColumn()
					->make(true);
		} 

		// Delete
		public function deletePenulis(Request $request, $id)
		{
			$hapus = 2;
			$penulis = Penulis::findOrFail($id);
			$penulis->terhapus = $hapus;
			$penulis->save();
			return redirect()->route('operator.pendukung.biblio')->with(['success' => 'Data Berhasil Di Hapus...']);
		}

		public function deletePenerbit(Request $request, $id)
		{
			$hapus = 2;
			$penerbit = Penerbit::findOrFail($id);
			$penerbit->terhapus = $hapus;
			$penerbit->save();
			return redirect()->route('operator.pendukung.biblio')->with(['success' => 'Data Berhasil Di Hapus...']);
		}

		public function deleteKlasifikasi(Request $request, $id)
		{
			$hapus = 2;
			$klasifikasi = Klasifikasi::findOrFail($id);
			$klasifikasi->terhapus = $hapus;
			$klasifikasi->save();
			return redirect()->route('operator.pendukung.biblio')->with(['success' => 'Data Berhasil Di Hapus...']);
		}

		public function deleteStatusItem(Request $request, $id)
		{
			$hapus = 2;
			$statusitem = StatusItem::findOrFail($id);
			$statusitem->terhapus = $hapus;
			$statusitem->save();
			return redirect()->route('operator.pendukung.biblio')->with(['success' => 'Data Berhasil Di Hapus...']);
		}

		public function deleteSumberItem(Request $request, $id)
		{
			$hapus = 2;
			$sumberitem = SumberItem::findOrFail($id);
			$sumberitem->terhapus = $hapus;
			$sumberitem->save();
			return redirect()->route('operator.pendukung.biblio')->with(['success' => 'Data Berhasil Di Hapus...']);
		}

		public function deleteTipeKoleksi(Request $request, $id)
		{
			$hapus = 2;
			$tipekoleksi = TipeKoleksi::findOrFail($id);
			$tipekoleksi->terhapus = $hapus;
			$tipekoleksi->save();
			return redirect()->route('operator.pendukung.biblio')->with(['success' => 'Data Berhasil Di Hapus...']);
		}

		public function deleteStatusSirkulasi(Request $request, $id)
		{
			$hapus = 2;
			$statussirkulasi = StatusSirkulasi::findOrFail($id);
			$statussirkulasi->terhapus = $hapus;
			$statussirkulasi->save();
			return redirect()->route('operator.pendukung.biblio')->with(['success' => 'Data Berhasil Di Hapus...']);
		}
}
