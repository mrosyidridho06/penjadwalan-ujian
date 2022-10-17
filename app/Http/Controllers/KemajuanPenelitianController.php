<?php

namespace App\Http\Controllers;

use App\Models\Sesi;
use App\Models\Ruangan;
use Illuminate\Http\Request;
use App\Models\KemajuanPenelitian;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class KemajuanPenelitianController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(auth()->user()->role == 'dosen'){
            $kemajuan = KemajuanPenelitian::with('mahasiswa', 'mahasiswa.dospemSatu.user','mahasiswa.dospemDua.user', 'sesi', 'ruangan')
                                        ->whereHas('mahasiswa', function ($query){
                                            $query->where('dospem_satu', Auth::user()->dosen->id);
                                        })
                                        ->orWhereHas('mahasiswa', function ($query){
                                            $query->where('dospem_dua', Auth::user()->dosen->id);
                                        })
                                        ->orderBy('id', 'asc')
                                        ->get();
        }elseif(auth()->user()->role == 'mahasiswa'){
            $kemajuan = KemajuanPenelitian::with('mahasiswa', 'mahasiswa.dospemSatu.user','mahasiswa.dospemDua.user', 'sesi', 'ruangan')->where('mahasiswa_id', auth()->user()->mahasiswa->id)->get();
        }else{
            $kemajuan = KemajuanPenelitian::with('mahasiswa', 'mahasiswa.dospemSatu.user','mahasiswa.dospemDua.user', 'sesi', 'ruangan')->orderBy('id', 'asc')->get();
        }

        return view('mahasiswa.kemajuan_penelitian.index', compact('kemajuan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $sesi = Sesi::get();
        $ruang = Ruangan::get();

        return view('mahasiswa.kemajuan_penelitian.create', compact('sesi', 'ruang'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'iduser' => 'required',
            'judul' => 'required',
            'draft' => 'required|file|mimes:pdf,doc,docx|max:10024',
            'sesi_id' => 'required',
            'tanggal' => 'required',
            'ruangan_id' => 'required',
        ]);

        $draft = Auth::user()->name. '_' .'Sidang Kemajuan Penelitian'. '_' .date('Y-m-d'). '.' . $request->draft->extension();
        $request->file('draft')->move('skripsi2/kemajuan_penelitian', $draft);

        KemajuanPenelitian::create([
            'mahasiswa_id' => $request->iduser,
            'judul' => $request->judul,
            'tanggal' => $request->tanggal,
            'sesi_id' => $request->sesi_id,
            'ruangan_id' => $request->ruangan_id,
            'draft' => $draft,
        ]);

        Alert::toast('Data Berhasil Dikirim', 'success');
        return redirect()->route('kemajuan-penelitian.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\KemajuanPenelitian  $kemajuanPenelitian
     * @return \Illuminate\Http\Response
     */
    public function show(KemajuanPenelitian $kemajuanPenelitian)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\KemajuanPenelitian  $kemajuanPenelitian
     * @return \Illuminate\Http\Response
     */
    public function edit(KemajuanPenelitian $kemajuanPenelitian)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\KemajuanPenelitian  $kemajuanPenelitian
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, KemajuanPenelitian $kemajuanPenelitian)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\KemajuanPenelitian  $kemajuanPenelitian
     * @return \Illuminate\Http\Response
     */
    public function destroy(KemajuanPenelitian $kemajuanPenelitian)
    {
        //
    }
}
