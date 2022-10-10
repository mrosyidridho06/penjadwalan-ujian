<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sesi extends Model
{
    use HasFactory;

    protected $table = 'sesis';
    protected $fillable = [
        'sesi',
        'jam_awal',
        'jam_akhir'
    ];

    public function internalJudul()
    {
        return $this->hasMany(InternalJudul::class);
    }
}
