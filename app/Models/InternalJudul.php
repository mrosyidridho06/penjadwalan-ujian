<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InternalJudul extends Model
{
    use HasFactory;

    protected $table = 'internal_juduls';
    protected $fillable = ['judul', 'draft', 'status_internal_id', 'tanggal', 'mahasiswa_id', 'ruangan_id', 'sesi_id'];

    public function ruangan()
    {
        return $this->belongsTo(Ruangan::class);
    }

    public function mahasiswa()
    {
        return $this->belongsTo(Mahasiswa::class);
    }

    public function sesi()
    {
        return $this->belongsTo(Sesi::class);
    }

    public function statusInternalJudul()
    {
        return $this->hasOne(StatusInternalJudul::class);
    }
}
