<?php

namespace App\Providers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Blade;
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
        Blade::if('role', function ($role) {
            return Auth::check() && config('roles')[Auth::user()->role] == $role;
        });

        Blade::if('roles', function ($roles_array) {
            if (!Auth::check()) {
                return false;
            }
            $res = false;
            foreach ($roles_array as $role) {
                $res += config('roles')[Auth::user()->role] == $role;
            }
            return $res;
        });
    }
}
