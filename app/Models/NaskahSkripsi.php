<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NaskahSkripsi extends Model
{
    use HasFactory;

    protected $table = 'naskah_skripsis';
    protected $fillable = ['judul', 'draft', 'tanggal', 'penguji1', 'penguji2', 'penguji3', 'mahasiswa_id', 'ruangan_id', 'sesi_id'];

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

    public function pengujiSatu()
    {
        return $this->belongsTo(Dosen::class, 'penguji1');
    }

    public function pengujiDua()
    {
        return $this->belongsTo(Dosen::class, 'penguji2');
    }

    public function pengujiTiga()
    {
        return $this->belongsTo(Dosen::class, 'penguji3');
    }
}
