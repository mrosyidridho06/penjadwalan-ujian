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

    public function internalJudul()
    {
        return $this->hasMany(internalJudul::class);
    }

    public function prodi()
    {
        return $this->belongsTo(Prodi::class);
    }




}
