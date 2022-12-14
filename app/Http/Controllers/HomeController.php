<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\InternalJudul;
use App\Models\InternalProsedural;
use App\Models\JadwalSidang;
use App\Models\KelayakanData;
use App\Models\KemajuanPenelitian;
use App\Models\Mahasiswa;
use App\Models\MetodePenelitian;
use App\Models\NaskahSkripsi;
use App\Models\PembimbinganNaskah;
use App\Models\SidangNaskahSkripsi;
use App\Models\TinjauanPustaka;

class HomeController extends Controller
{
    public function index()
    {
        $InternalJudul = InternalJudul::with('mahasiswa', 'mahasiswa.dospemSatu.user','mahasiswa.dospemDua.user', 'sesi', 'ruangan')->get();
        $metpen = MetodePenelitian::with('mahasiswa', 'mahasiswa.dospemSatu.user','mahasiswa.dospemDua.user', 'sesi', 'ruangan')->get();
        $tipus = TinjauanPustaka::with('mahasiswa', 'mahasiswa.dospemSatu.user','mahasiswa.dospemDua.user', 'sesi', 'ruangan')->get();
        $pn = PembimbinganNaskah::with('mahasiswa', 'mahasiswa.dospemSatu.user','mahasiswa.dospemDua.user', 'sesi', 'ruangan')->get();
        $prosedural = InternalProsedural::with('mahasiswa', 'mahasiswa.dospemSatu.user','mahasiswa.dospemDua.user', 'sesi', 'ruangan')->get();
        $kemajuan = KemajuanPenelitian::with('mahasiswa', 'mahasiswa.dospemSatu.user','mahasiswa.dospemDua.user', 'sesi', 'ruangan')->get();
        $kelayakan = KelayakanData::with('mahasiswa', 'mahasiswa.dospemSatu.user','mahasiswa.dospemDua.user', 'sesi', 'ruangan')->get();
        $sidangnaskah = SidangNaskahSkripsi::with('mahasiswa', 'mahasiswa.dospemSatu.user','mahasiswa.dospemDua.user', 'sesi', 'ruangan')->get();
        $ujiannaskah = NaskahSkripsi::with('mahasiswa', 'mahasiswa.dospemSatu.user','mahasiswa.dospemDua.user', 'sesi', 'ruangan', 'pengujiSatu.user', 'pengujiDua.user', 'pengujiTiga.user')->get();

        $mhs = JadwalSidang::with('mahasiswa', 'mahasiswa.dospemSatu.user','mahasiswa.dospemDua.user', 'sesi', 'ruangan', 'pengujiSatu.user', 'pengujiDua.user', 'pengujiTiga.user')->where('sidang_type', '!=', 'uns')->get();
        $uns = JadwalSidang::with('mahasiswa', 'mahasiswa.dospemSatu.user','mahasiswa.dospemDua.user', 'sesi', 'ruangan', 'pengujiSatu.user', 'pengujiDua.user', 'pengujiTiga.user')->where('sidang_type', '=', 'uns')->get();

        return view('home', compact('InternalJudul', 'metpen', 'tipus', 'pn', 'prosedural', 'kemajuan', 'kelayakan', 'sidangnaskah', 'ujiannaskah', 'mhs', 'uns'));
    }
}
