<?php

namespace App\Providers;

use App\Models\Appartement;
use App\Models\Hotel;
use App\Models\Reservation;
use App\Models\User;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

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
        //
         View::composer('superadmin.partials.stats', function ($view) {
        $view->with('stats', [
            'utilisateurs' => User::count(),
            'hotels'       => Hotel::count(),
            'appartements' => Appartement::count(),
            'reservations' => Reservation::count(),
        ]);
    });
    }
}
