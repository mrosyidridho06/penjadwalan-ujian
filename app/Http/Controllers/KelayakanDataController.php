<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Sesi;
use App\Models\Ruangan;
use Illuminate\Support\Str;
use App\Models\JadwalSidang;
use Illuminate\Http\Request;
use App\Models\KelayakanData;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
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
            $kelayakan = JadwalSidang::with('mahasiswa', 'mahasiswa.dospemSatu.user','mahasiswa.dospemDua.user', 'sesi', 'ruangan')
                                        ->where('sidang_type', 'kelayakan_data')
                                        ->whereHas('mahasiswa', function ($query){
                                            $query->where('dospem_satu', Auth::user()->dosen->id);
                                        })
                                        ->orWhereHas('mahasiswa', function ($query){
                                            $query->where('dospem_dua', Auth::user()->dosen->id);
                                        })
                                        ->orderBy('id', 'asc')
                                        ->get();
        }elseif(auth()->user()->role == 'mahasiswa'){
            $kelayakan = JadwalSidang::with('mahasiswa', 'mahasiswa.dospemSatu.user','mahasiswa.dospemDua.user', 'sesi', 'ruangan')->where('mahasiswa_id', auth()->user()->mahasiswa->id)->where('sidang_type', 'kelayakan_data')->get();
        }else{
            $kelayakan = JadwalSidang::with('mahasiswa', 'mahasiswa.dospemSatu.user','mahasiswa.dospemDua.user', 'sesi', 'ruangan')->orderBy('id', 'asc')->where('sidang_type', 'kelayakan_data')->get();
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

        $ru = $request->ruangan_id;
        $se = $request->sesi_id;

        if(JadwalSidang::with('mahasiswa', 'mahasiswa.dospemSatu.user','mahasiswa.dospemDua.user', 'statusInternalJudul', 'sesi', 'ruangan')
                            ->where('tanggal', '=', $request->tanggal)
                            ->whereHas('sesi', function($q) use($se){
                                $q->where('id', '=', $se);
                            })
                            ->whereHas('ruangan', function($q) use($ru){
                                $q->where('id', '=', $ru);
                            })
                            ->exists()){
                                Alert::toast('Jadwal Sudah Terisi', 'error');
                                return redirect()->back()->withInput();
                            }
        else{
            $draft = Auth::user()->name. '_' .'Internal Kelayakan Data'. '_' .date('d-m-Y'). '.' . $request->draft->extension();
            $request->file('draft')->move('skripsi2/kelayakan_data', $draft);

            $itj = JadwalSidang::create([
                'mahasiswa_id' => $request->iduser,
                'judul' => $request->judul,
                'slug' => Str::slug($request->judul),
                'tanggal' => $request->tanggal,
                'sesi_id' => $request->sesi_id,
                'ruangan_id' => $request->ruangan_id,
                'sidang_type' => $request->sidang_type,
                'draft' => $draft,
            ]);

            Alert::toast('Data Berhasil Dikirim', 'success');
            return redirect()->route('kelayakan-data.index');
        }
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
    public function edit($id)
    {
        $kelayakanData = JadwalSidang::where('sidang_type', 'kelayakan_data')->find($id);
        try {
            $kelayakanData->mahasiswa_id = auth()->user()->mahasiswa->id;
            $ruangan = Ruangan::get();
            $sesi = Sesi::get();

            return view('mahasiswa.kelayakan_data.edit', compact('kelayakanData', 'ruangan', 'sesi'));
            } catch (Exception $e){
                Alert::toast('Error', 'error');
                return redirect()->back();
        }

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'ruangan_id' => 'required',
            'sesi_id' => 'required',
            'tanggal' => 'required',
            'draft' => 'file|mimes:pdf,doc,docx|max:10024'
        ]);
        $ru = $request->ruangan_id;
        $se = $request->sesi_id;

        if(JadwalSidang::with('mahasiswa', 'mahasiswa.dospemSatu.user','mahasiswa.dospemDua.user', 'sesi', 'ruangan')
                            ->where('tanggal', '=', $request->tanggal)
                            ->where('mahasiswa_id', '!=', Auth::user()->mahasiswa->id)
                            ->whereHas('sesi', function($q) use($se){
                                $q->where('id', '=', $se);
                            })
                            ->whereHas('ruangan', function($q) use($ru){
                                $q->where('id', '=', $ru);
                            })
                            ->exists()){
                                Alert::toast('Jadwal Sudah Terisi', 'error');
                                return redirect()->back()->withInput();
        }else{
            $internalProsedural = JadwalSidang::with('mahasiswa')->find($id);
            $reqpro = $request->all();

            if($draft = $request->file('draft')) {
                File::delete('skripsi2/kelayakan_data'.$internalProsedural->draft);
                $destinationPath = 'skripsi2/kelayakan_data';
                $filename = $internalProsedural->mahasiswa->user->name. '_' .'Internal Kelayakan Data '. '_' .date('d-m-Y'). '.' . $request->draft->extension();
                $draft->move($destinationPath, $filename);
                $reqpro['draft'] = "$filename";
            }else{
                unset($reqpro['draft']);
            }

            $internalProsedural->update($reqpro);

            Alert::toast('Data Berhasil Diupdate', 'success');

            return redirect()->route('kelayakan-data.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $internalProsedural = JadwalSidang::where('sidang_type', 'kelayakan_data')->find($id);

        $internalProsedural->delete();

        Alert::toast('Data Berhasil Dihapus', 'success');
        return redirect()->back();

    }
}
