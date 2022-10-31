<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\InternalJudul;
use Illuminate\Http\Request;

class InternalJudulController extends Controller
{
    public function index()
    {
        $internal = InternalJudul::with('mahasiswa', 'mahasiswa.dospemSatu.user','mahasiswa.dospemDua.user', 'sesi', 'ruangan')->orderBy('id', 'asc')->get();

        return response()->json(['msg' => 'Data retrieved', 'data' => $internal], 200);
    }

}
