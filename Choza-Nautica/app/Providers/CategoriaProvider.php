<?php

namespace App\Providers;

use App\Models\categorias;
use Illuminate\Support\ServiceProvider;

class CategoriaProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer("*",function($view){
            $categorias = categorias::where('estado',1)->get();
            $view->with('categorias_provider',$categorias);
        });
    }
}
