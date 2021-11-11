<?php

namespace App\Providers;

use App\Models\Productos;
use Illuminate\Support\ServiceProvider;

class ProductsProvider extends ServiceProvider
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
            $Productos = Productos::where('estado',1)->orderBy('id')->paginate(5);
            $view->with('productos_destacados',$Productos);
        });
    }
}
