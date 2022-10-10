<?php

namespace App\Providers;

use Carbon\Carbon;
use App\Models\InternalJudul;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        config(['app.locale' => 'id']);
	    Carbon::setLocale('id');

        View::share('InternalJudul', InternalJudul::with('mahasiswa', 'mahasiswa.dospemSatu.user','mahasiswa.dospemDua.user', 'sesi', 'ruangan')->where('status', 'disetujui')->get());
    }
}
