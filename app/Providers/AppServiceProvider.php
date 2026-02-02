<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
// ADD THIS LINE BELOW:
use Illuminate\Support\Facades\Gate; 

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
        if (request()->has('ref')) {
        // Queue a cookie named 'sino_ref' for 30 days
        cookie()->queue('sino_ref', request()->query('ref'), 43200); 
    }
    }
}