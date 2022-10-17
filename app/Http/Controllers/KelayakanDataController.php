<?php

namespace App\Http\Controllers;

use App\Models\Sesi;
use App\Models\Ruangan;
use Illuminate\Http\Request;
use App\Models\KelayakanData;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class KelayakanDataController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(auth()->user()->role == 'dosen'){
            $kelayakan = KelayakanData::with('mahasiswa', 'mahasiswa.dospemSatu.user','mahasiswa.dospemDua.user', 'sesi', 'ruangan')
                                        ->whereHas('mahasiswa', function ($query){
                                            $query->where('dospem_satu', Auth::user()->dosen->id);
                                        })
                                        ->orWhereHas('mahasiswa', function ($query){
                                            $query->where('dospem_dua', Auth::user()->dosen->id);
                                        })
                                        ->orderBy('id', 'asc')
                                        ->get();
        }elseif(auth()->user()->role == 'mahasiswa'){
            $kelayakan = KelayakanData::with('mahasiswa', 'mahasiswa.dospemSatu.user','mahasiswa.dospemDua.user', 'sesi', 'ruangan')->where('mahasiswa_id', auth()->user()->mahasiswa->id)->get();
        }else{
            $kelayakan = KelayakanData::with('mahasiswa', 'mahasiswa.dospemSatu.user','mahasiswa.dospemDua.user', 'sesi', 'ruangan')->orderBy('id', 'asc')->get();
        }

        return view('mahasiswa.kelayakan_data.index', compact('kelayakan'));
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

        return view('mahasiswa.kelayakan_data.create', compact('sesi', 'ruang'));
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

        $draft = Auth::user()->name. '_' .'Sidang Kelayakan Data'. '_' .date('Y-m-d'). '.' . $request->draft->extension();
        $request->file('draft')->move('skripsi2/kelayakan_data', $draft);

        KelayakanData::create([
            'mahasiswa_id' => $request->iduser,
            'judul' => $request->judul,
            'tanggal' => $request->tanggal,
            'sesi_id' => $request->sesi_id,
            'ruangan_id' => $request->ruangan_id,
            'draft' => $draft,
        ]);

        Alert::toast('Data Berhasil Dikirim', 'success');
        return redirect()->route('kelayakan-data.index');
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\KelayakanData  $kelayakanData
     * @return \Illuminate\Http\Response
     */
    public function show(KelayakanData $kelayakanData)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\KelayakanData  $kelayakanData
     * @return \Illuminate\Http\Response
     */
    public function edit(KelayakanData $kelayakanData)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\KelayakanData  $kelayakanData
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, KelayakanData $kelayakanData)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\KelayakanData  $kelayakanData
     * @return \Illuminate\Http\Response
     */
    public function destroy(KelayakanData $kelayakanData)
    {
        //
    }
}
