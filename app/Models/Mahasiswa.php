<?php

namespace App\Models;

use Facade\FlareClient\Concerns\HasContext;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    use HasFactory;

    protected $table = 'mahasiswas';
    protected $fillable = ['nim', 'angkatan', 'alamat', 'prodi_id', 'user_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }




}
