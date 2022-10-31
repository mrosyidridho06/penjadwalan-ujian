<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Dosen;
use App\Models\Mahasiswa;
use App\Models\Prodi;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Carbon\Carbon;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $prodi = Prodi::get();
        $dosen = Dosen::with('user')->get();

        return view('auth.register', compact('prodi', 'dosen'));
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()->min(8)->numbers()->mixedCase()],
            'nim' => ['required', 'digits:10', 'numeric', 'unique:mahasiswas'],
            'angkatan' => ['required'],
            'alamat' => ['required', 'string'],
            'prodi' => ['required'],
            'dospem_satu' => ['required'],
            'dospem_dua' => ['required'],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'last_login_at' => Carbon::now(),
            'last_login_ip' => $request->getClientIp(),
            'role' => 'mahasiswa'
        ]);

        // dd($user->id);

        Mahasiswa::create([
            'nim' => $request->nim,
            'angkatan' => $request->angkatan,
            'alamat' => $request->alamat,
            'prodi_id' => $request->prodi,
            'dospem_satu' => $request->dospem_satu,
            'dospem_dua' => $request->dospem_dua,
            'user_id' => $user->id,
        ]);


        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }
}
