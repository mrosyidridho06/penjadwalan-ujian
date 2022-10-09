<?php

namespace App\Http\Controllers;

use App\Models\UjianSarjana;
use Illuminate\Http\Request;

class UjianSarjanaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('mahasiswa.ujian_sarjana.index');
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
     * @param  \App\Models\UjianSarjana  $ujianSarjana
     * @return \Illuminate\Http\Response
     */
    public function show(UjianSarjana $ujianSarjana)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\UjianSarjana  $ujianSarjana
     * @return \Illuminate\Http\Response
     */
    public function edit(UjianSarjana $ujianSarjana)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\UjianSarjana  $ujianSarjana
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, UjianSarjana $ujianSarjana)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\UjianSarjana  $ujianSarjana
     * @return \Illuminate\Http\Response
     */
    public function destroy(UjianSarjana $ujianSarjana)
    {
        //
    }
}
