<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Dosen;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DosensTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name' => 'Fika Aryati, M.Farm., Apt',
            'email' => 'fika@lecturer.unmul.ac.id',
            'password' => Hash::make('password'),
            'last_login_at' => null,
            'last_login_ip' => null,
            'role' => 'dosen'
        ]);
        Dosen::create([
            'nip' => '1231414141',
            'alamat' => 'Jl. Jakarta',
            'jabatan' => 'Dosen',
            'user_id' => $user->id,
        ]);
    }
}
