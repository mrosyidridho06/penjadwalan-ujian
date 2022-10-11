<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StatusInternalJudul extends Model
{
    use HasFactory;

    protected $table = 'status_internal_juduls';

    protected $fillable = [
        'status_dospem1',
        'status_dospem2',
        'internal_judul_id'
    ];

    public function internalJudul()
    {
        return $this->belongsTo(internalJudul::class);
    }
}
