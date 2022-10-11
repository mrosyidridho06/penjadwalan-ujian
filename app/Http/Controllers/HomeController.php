<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\InternalJudul;

class HomeController extends Controller
{
    public function index()
    {
        $InternalJudul = InternalJudul::with('mahasiswa', 'mahasiswa.dospemSatu.user','mahasiswa.dospemDua.user', 'statusInternalJudul', 'sesi', 'ruangan')
                ->whereHas('statusInternalJudul', function ($query){
                    $query->where('status_dospem1', 'disetujui');
                })
                ->whereHas('statusInternalJudul', function($query){
                    $query->where('status_dospem2', 'disetujui');
                })
                ->get();
        return view('home', compact('InternalJudul'));
    }
}
