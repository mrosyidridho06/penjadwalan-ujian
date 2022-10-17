<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TinjauanPustaka extends Model
{
    use HasFactory;

    protected $table = 'tinjauan_pustakas';
    protected $fillable = ['judul', 'draft', 'tanggal', 'mahasiswa_id', 'ruangan_id', 'sesi_id'];

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
}
