<?php

namespace App\Http\Controllers\Operator;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Model\DataMaster\User;
use App\Model\DataMaster\Biblio;
use DB;

class OperatorController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('IsOperator');
    }

    public function index()
    {
        // Angota
        $anggota = User::count();
        // Buku
        $biblio = Biblio::count();
        // Buku Dipinjam
        $status = DB::table('status_item')->where('status_item_nama', '=', 'Dipinjam')->get()->first();
        $bukupinjam = DB::table('biblio')->where('status_item_id', '=', $status->status_item_id)->count();
    
        return view('operator.dashboard', compact('anggota', 'biblio', 'bukupinjam'));
    }
}
