<?php

namespace App\Providers;

use App\Http\Controllers\MenuController;
use Illuminate\Support\Facades\Auth;
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
        // $this->menu  = new MenuController;
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // view()->composer('*', function($view)
        // {
        //     if (Auth::check()) {
        //         $data_menu = $this->menu->index();
        //         $view->with('data_menu', $data_menu);
        //     }else {
        //         $view->with('data_menu', null);
        //     }
        // });
    }
}
