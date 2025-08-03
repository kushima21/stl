<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Session;
use App\Models\Registration;
class GlobalUserProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
  public function boot()
{
    View::composer('*', function ($view) {
        if (Session::has('user_id')) {
            $user = Registration::find(Session::get('user_id'));
            $view->with('globalUser', $user);
        }
    });
}

}
