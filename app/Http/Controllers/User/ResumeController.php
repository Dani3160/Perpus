<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ResumeController extends Controller
{
    public function store(Request $request)
    {
        if ($id) {
            $resume = Resume::findOrFail($id);
        } else {
            $resume = New Resume;
        }
        $resume->anggota_id = $request->anggota_id;
        $resume->kelas_id = $request->kelas_id;
        $resume->resume_judul = $request->resume_judul;
        $resume->resume_isi = $request->resume_isi;
        $resume->save();
    }
}
