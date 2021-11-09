<?php

namespace App\Providers;

use App\Models\empresa_detalles;
use Illuminate\Support\ServiceProvider;

class EmpresaProvider extends ServiceProvider
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
            $empresa = empresa_detalles::where('id',1)->firstOrFail();
            $view->with('empresa_provider',$empresa);
        });
    }
}
