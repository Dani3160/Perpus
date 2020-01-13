<?php

namespace App\Http\Controllers\Operator\DataMaster;

use DB;
use Image;
use Storage;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;
use App\Exports\BiblioExport;
use App\Imports\BiblioImport;
use App\Http\Controllers\Controller;
use App\Model\DataPendukung\Penerbit;
use App\Model\DataPendukung\Penulis;
use App\Model\DataPendukung\Klasifikasi;
use App\Model\DataPendukung\TipeKoleksi;
use App\Model\DataPendukung\StatusItem;
use App\Model\DataPendukung\SumberItem;
use App\Model\DataMaster\Biblio;
use Yajra\Datatables\Datatables;

class BiblioController extends Controller
{
	public function daftarbiblio()
	{
		$penerbit = Penerbit::All();
		$penulis = Penulis::All();
		$klasifikasi = Klasifikasi::All();
		$tipekoleksi = TipeKoleksi::All();
		$statusitem = StatusItem::All();
		$sumberitem = SumberItem::All();
		return view('operator.datamaster.biblio.index', ['penerbit' => $penerbit, 'penulis' => $penulis, 'klasifikasi' => $klasifikasi, 'tipekoleksi' => $tipekoleksi, 'statusitem' => $statusitem, 'sumberitem' => $sumberitem]);
	}

	public function bibliodatatable()
	{	
		$biblio = DB::table('biblio')
		->join('penulis', 'biblio.penulis_id', '=', 'penulis.penulis_id')
		->join('penerbit', 'biblio.penerbit_id', '=', 'penerbit.penerbit_id')
		->join('status_item', 'biblio.status_item_id', '=', 'status_item.status_item_id')
		->select('biblio.*',
			'penulis.penulis_nama',
			'penerbit.penerbit_nama',
			'status_item.status_item_nama'
		)
		->where('biblio.terhapus', '=' , '1')
		->get();

		return Datatables::of($biblio)
		->addColumn('action', 'operator.datamaster.biblio.action')
		->addIndexColumn()
		->make(true);

	}

	public function caripenulis(Request $request)
	{
		$cari = $request->get('term');
		$hasil = Penulis::where('penulis_nama', 'LIKE', '%'.$cari.'%')->get();
		$data = array();
		foreach ($hasil as $key => $p) 
		{
			$data[] = array('value' => $p->penulis_id, 'id' => $p->penulis_id, 'label' => $p->penulis_nama);
		}
		if (count($data)) 
		{
			return $data;
		} else {
			return ['value' => 'Data tidak ada', 'id' => ''];
		}
	}

	public function caripenerbit(Request $request)
	{
		$pencarian = $request->get('term');
		$result = Penerbit::where('penerbit_nama', 'LIKE', '%'.$pencarian.'%')->get();
		$data = array();
		foreach ($result as $key => $p) 
		{
			$data[] = array('value' => $p->penerbit_id, 'id' => $p->penerbit_id, 'label' => $p->penerbit_nama);
		}
		if (count($data)) 
		{
			return $data;
		} else {
			return ['value' => 'Data tidak ada', 'id' => ''];
		}
	}	
	public function carisumberitem(Request $request)
	{
		$pencarian = $request->get('term');
		$result = SumberItem::where('sumber_item_nama', 'LIKE', '%'.$pencarian.'%')->get();
		$data = array();
		foreach ($result as $key => $p) 
		{
			$data[] = array('value' => $p->sumber_item_id, 'id' => $p->sumber_item_id, 'label' => $p->sumber_item_nama);
		}
		if (count($data)) 
		{
			return $data;
		} else {
			return ['value' => 'Data tidak ada', 'id' => ''];
		}
	}	

	public function store(Request $request)
	{

		$hapus = 1;
		for ($i=1; $i <= $request->buku_tersedia; $i++) {
			$biblio = new Biblio;
			$biblio->judul = $request->judul;
			$biblio->edisi = $request->edisi;
			$biblio->penulis_id = $request->penulis_id;
			$biblio->isbn = $request->isbn;
			$biblio->penerbit_id = $request->penerbit_id;
			$biblio->harga_buku = $request->harga_buku;
			$biblio->penerbit_tahun = $request->penerbit_tahun;
			$biblio->penerbit_tempat = $request->penerbit_tempat;
			$biblio->deskripsi = $request->deskripsi;
			$biblio->tipekoleksi_id = $request->tipekoleksi_id;
			$biblio->klasifikasi_id = $request->klasifikasi_id;
			$foto = $request->file('gambar'); 
			if ($foto) {
				$filename = time() . '.' . $foto->getClientOriginalExtension();
				Image::make($foto)->resize(400, 400)->save(public_path('image/datamaster/biblio/' .$filename));
				$biblio->gambar = $filename;
			} else {
				$biblio->gambar = 0;
			}
			if ($request->hasFile('lampiran')) 
			{
				$filename_lampiran = $request->lampiran->getClientOriginalName();
				$request->lampiran->storeAs('public/file/datamaster/biblio', $filename_lampiran);
				$biblio->lampiran = $filename_lampiran;
			} else {
				$biblio->lampiran = 0;
			}
			$biblio->panggil = $request->panggil;
			$biblio->eksemplar = $request->panggil.$request->tingkatan.$request->urutan++;
			$biblio->status_item_id = $request->status_item_id;
			$biblio->sumber_item_id = $request->sumber_item_id;
			$biblio->publik = $request->publik;
			$biblio->promosi = $request->promosi;
			$biblio->terhapus = $hapus;
			$biblio->save();
		}
		return redirect()->route('operator.biblio')->with(['sukses' => 'Sukses!!!']);
	}

	public function show($id)
	{
		$penerbit = Penerbit::All();
		$penulis = Penulis::All();
		$tipekoleksi = TipeKoleksi::All();
		$klasifikasi = Klasifikasi::All();
		$statusitem = StatusItem::All();
		$sumberitem = SumberItem::All();
		$biblio = Biblio::findOrFail($id);
		return view('operator.datamaster.biblio.detail', compact('penerbit', 'penulis', 'tipekoleksi', 'klasifikasi', 'statusitem', 'sumberitem','biblio'));
	}

	public function unduh()
	{
		$lampiran = Biblio::where('lampiran')->get();
		return view('operator.datamaster.biblio.detail', compact('lampiran'));
	}

	public function edit($id)
	{
		$penerbit = Penerbit::All();
		$penulis = Penulis::All();
		$tipekoleksi = TipeKoleksi::All();
		$klasifikasi = Klasifikasi::All();
		$statusitem = StatusItem::All();
		$sumberitem = SumberItem::All();
		$biblio = Biblio::findOrFail($id);
		return view('operator.datamaster.biblio.edit', compact('penerbit', 'penulis', 'tipekoleksi', 'klasifikasi', 'statusitem', 'sumberitem','biblio'));
	}

	public function update(Request $request, $id)
	{
		$biblio = Biblio::findOrFail($id);
		$biblio->judul = $request->judul;
		$biblio->edisi = $request->edisi;
		$biblio->penulis_id = $request->penulis_id;
		$biblio->isbn = $request->isbn;
		$biblio->penerbit_id = $request->penerbit_id;
		$biblio->harga_buku = $request->harga_buku;
		$biblio->penerbit_tahun = $request->penerbit_tahun;
		$biblio->penerbit_tempat = $request->penerbit_tempat;
		$biblio->deskripsi = $request->deskripsi;
		$foto = $request->File('gambar');
		if ($foto) {
			$filename = time() . '.' . $foto->getClientOriginalExtension();
			Image::make($foto)->resize(400, 400)->save(public_path('image/datamaster/biblio/' .$filename));
			$biblio->gambar = $filename;
		} else {
			$biblio->gambar = 0;
		}
		if ($request->hasFile('lampiran')) 
		{
			$filename_lampiran = $request->lampiran->getClientOriginalName();
			$request->lampiran->storeAs('public/file/datamaster/biblio', $filename_lampiran);
			$biblio->lampiran = $filename_lampiran;
		} else {
			$biblio->lampiran = 0;
		}
		$biblio->tipekoleksi_id = $request->tipekoleksi_id;
		$biblio->klasifikasi_id = $request->klasifikasi_id;
		$biblio->status_item_id = $request->status_item_id;
		$biblio->sumber_item_id = $request->sumber_item_id;
		$biblio->publik = $request->publik;
		$biblio->promosi = $request->promosi;
		$biblio->save();
		return redirect()->route('operator.biblio')->with(['pesan' => 'Sukses!!']);
	}

	public function export() 
	{
		return Excel::download(new BiblioExport, 'biblio.xlsx');
	}

	public function uploadexcel() 
	{
		return view('operator.datamaster.biblio.import');
	}

	public function import(Request $request)
	{
		if ($request->hasFile('file')) {
			$file = $request->file('file');
			Excel::import(new BiblioImport, $file);
			return redirect()->route('operator.biblio');
		}        
	}

	public function delete(Request $request, $id)
	{
		$hapus = 2;
		$biblio = Biblio::findOrFail($id);
		$biblio->terhapus = $hapus;
		$biblio->save();
		return redirect()->route('operator.biblio');
	}

	//Riwayat biblio
	public function indexRiwayat()
	{
		return view('operator.datamaster.biblio.riwayat.index');
	}
	public function riwayatdatatable()
	{	
		$riwayat = DB::table('biblio')
		->join('penulis', 'biblio.penulis_id', '=', 'penulis.penulis_id')
		->join('penerbit', 'biblio.penerbit_id', '=', 'penerbit.penerbit_id')
		->join('status_item', 'biblio.status_item_id', '=', 'status_item.status_item_id')
		->select('biblio.*',
			'penulis.penulis_nama',
			'penerbit.penerbit_nama',
			'status_item.status_item_nama', 
		)
		->where('biblio.terhapus', '=', '2')
		->get();

		return Datatables::of($riwayat)
		->addIndexColumn()
		->make(true);

	}

}