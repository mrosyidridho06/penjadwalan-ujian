<?php

namespace App\Http\Controllers;

use App\Models\Kolokium;
use Illuminate\Http\Request;

class KolokiumController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('mahasiswa.kolokium.index');
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
     * @param  \App\Models\Kolokium  $kolokium
     * @return \Illuminate\Http\Response
     */
    public function show(Kolokium $kolokium)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Kolokium  $kolokium
     * @return \Illuminate\Http\Response
     */
    public function edit(Kolokium $kolokium)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Kolokium  $kolokium
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Kolokium $kolokium)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Kolokium  $kolokium
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kolokium $kolokium)
    {
        //
    }
}
