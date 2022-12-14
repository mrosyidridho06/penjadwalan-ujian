<?php

namespace App\Models;

use Facade\FlareClient\Concerns\HasContext;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    use HasFactory;

    protected $table = 'mahasiswas';
    protected $fillable = ['nim', 'angkatan', 'alamat', 'prodi_id', 'user_id', 'dospem_satu', 'dospem_dua'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function dospemSatu()
    {
        return $this->belongsTo(Dosen::class, 'dospem_satu');
    }

    public function dospemDua()
    {
        return $this->belongsTo(Dosen::class, 'dospem_dua');
    }

    public function jadwalSidang()
    {
        return $this->hasMany(JadwalSidang::class);
    }

    public function internalJudul()
    {
        return $this->hasMany(internalJudul::class);
    }

    public function metodePenelitian()
    {
        return $this->hasMany(MetodePenelitian::class);
    }

    public function tinjauanPustaka()
    {
        return $this->hasMany(TinjauanPustaka::class);
    }

    public function pembimbinganNaskah()
    {
        return $this->hasMany(PembimbinganNaskah::class);
    }

    public function internalProsedural()
    {
        return $this->hasMany(InternalProsedural::class);
    }

    public function kemajuanPenelitian()
    {
        return $this->hasMany(KemajuanPenelitian::class);
    }

    public function kelayakanData()
    {
        return $this->hasMany(KelayakanData::class);
    }

    public function sidangNaskah()
    {
        return $this->hasMany(SidangNaskahSkripsi::class);
    }
    public function naskahSkripsi()
    {
        return $this->hasMany(NaskahSkripsi::class);
    }

    public function prodi()
    {
        return $this->belongsTo(Prodi::class);
    }




}
