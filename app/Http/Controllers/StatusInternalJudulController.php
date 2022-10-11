<?php

namespace App\Http\Controllers;

use App\Models\StatusInternalJudul;
use Illuminate\Http\Request;

class StatusInternalJudulController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\StatusInternalJudul  $statusInternalJudul
     * @return \Illuminate\Http\Response
     */
    public function show(StatusInternalJudul $statusInternalJudul)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\StatusInternalJudul  $statusInternalJudul
     * @return \Illuminate\Http\Response
     */
    public function edit(StatusInternalJudul $statusInternalJudul)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\StatusInternalJudul  $statusInternalJudul
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, StatusInternalJudul $statusInternalJudul)
    {
        $request->validate([
            'status_dospem1' => 'required',
            'status_dospem2' => 'required'
        ]);

        $statusInternalJudul->update([
            'status_dospem1' => $request->status_dospem1,
            'status_dospem2' => $request->status_dospem2,
        ]);

        return redirect()->route('internal-judul.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\StatusInternalJudul  $statusInternalJudul
     * @return \Illuminate\Http\Response
     */
    public function destroy(StatusInternalJudul $statusInternalJudul)
    {
        //
    }
}
