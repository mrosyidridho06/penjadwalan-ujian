<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dosen extends Model
{
    use HasFactory;

    protected $table = 'dosens';
    protected $fillable = ['nip', 'nama', 'alamat', 'jabatan', 'user_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function proposal()
    {
        return $this->hasMany(Proposal::class);
    }

    public function mahasiswa()
    {
        return $this->hasMany(Mahasiswa::class);
    }

    public function naskahSkripsi()
    {
        return $this->hasManyThrough(NaskahSkripsi::class, 'penguji1', 'penguji2', 'penguji3');
    }

}
