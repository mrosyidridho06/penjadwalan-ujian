<?php

namespace App\Http\Controllers;

use App\Models\Sesi;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class SesiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sesi = Sesi::get();

        return view('master.sesi.index', compact('sesi'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            'sesi' => 'required',
            'jam_awal' => 'required',
            'jam_akhir' => 'required'
        ]);

        Sesi::updateOrCreate([
            'sesi' => $request->sesi,
            'jam_awal' => $request->jam_awal,
            'jam_akhir' => $request->jam_akhir,
        ]);

        Alert::toast('Data Berhasil Ditambah', 'success');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Sesi  $sesi
     * @return \Illuminate\Http\Response
     */
    public function show(Sesi $sesi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Sesi  $sesi
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $sesi = Sesi::find($id);

        return $sesi;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Sesi  $sesi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'sesi' => 'required',
            'jam_awal' => 'required',
            'jam_akhir' => 'required'
        ]);

        $sesi = Sesi::findOrFail($id);

        $sesi->sesi = $request->sesi;
        $sesi->jam_awal = $request->jam_awal;
        $sesi->jam_akhir = $request->jam_akhir;
        $sesi->save();

        Alert::toast('Data Berhasil Diupdate', 'success');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Sesi  $sesi
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sesi $sesi)
    {
        $sesi->delete();

        Alert::toast('Data Berhasil Dihapus', 'warning');
        return redirect()->back();
    }
}
