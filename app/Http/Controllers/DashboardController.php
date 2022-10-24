<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\InternalJudul;
use App\Models\InternalProsedural;
use App\Models\Mahasiswa;
use App\Models\NaskahSkripsi;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        if(auth()->check()){
            if(auth()->user()->role == 'admin'){
                $internalJudul = InternalJudul::with('mahasiswa', 'mahasiswa.dospemSatu.user','mahasiswa.dospemDua.user', 'sesi', 'ruangan')->get();
                return view('dashboard', compact('internalJudul'));
            }elseif(auth()->user()->role == 'dosen'){
                $internalJudul = InternalJudul::with('mahasiswa', 'mahasiswa.dospemSatu.user','mahasiswa.dospemDua.user', 'sesi', 'ruangan')
                                        ->whereHas('mahasiswa', function ($query){
                                            $query->where('dospem_satu', Auth::user()->dosen->id);
                                        })
                                        ->orWhereHas('mahasiswa', function ($query){
                                            $query->where('dospem_dua', Auth::user()->dosen->id);
                                        })
                                        ->get();
                $prosedural = InternalProsedural::with('mahasiswa', 'mahasiswa.dospemSatu.user','mahasiswa.dospemDua.user', 'sesi', 'ruangan')->get();
                $jumlahmhs = Mahasiswa::with('user', 'dospemSatu', 'dospemDua')->where('dospem_satu', Auth::user()->dosen->id)->orWhere('dospem_dua', Auth::user()->dosen->id)->count();

                return view('dashboard', compact('internalJudul', 'jumlahmhs', 'prosedural'));
            }else{
                $internalJudul = InternalJudul::with('mahasiswa', 'mahasiswa.dospemSatu.user','mahasiswa.dospemDua.user', 'sesi', 'ruangan')->where('mahasiswa_id', auth()->user()->mahasiswa->id)->get();
                return view('dashboard', compact('internalJudul'));
            }
        }

    }
}
