<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Radicado;
use App\Models\Program;
use App\User;
use Illuminate\Support\Facades\Auth;
use DB;

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
        
    }
}
