<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\Jurusan;
use App\Models\Ekstrakurikuler;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        View::composer('layouts.navigation-public', function ($view) {
            $view->with('semuaJurusan', Jurusan::orderBy('nama')->get());
            $view->with('semuaEkskul', Ekstrakurikuler::orderBy('nama')->get());
            
        });
    }
}