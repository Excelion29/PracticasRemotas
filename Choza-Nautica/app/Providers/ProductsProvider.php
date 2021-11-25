<?php

namespace App\Providers;

use App\Models\combos;
use App\Models\Productos;
use Illuminate\Support\Facades\DB;
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
            $productos_nuevos = Productos::where('cantidad','>','0')->where('estado',1)->orderByDesc('id')->take(4)->get();
            $sale_Productos = Productos::where('cantidad','>','0')->where('estado',1)->withCount(['compras_detalles as sale_count' =>function($query){
                $query->select(DB::raw('sum((cantidad))'));
            }])->orderByDesc('sale_count')->take(4)->get();
            $ratings_Productos = Productos::where('cantidad','>','0')->where('estado',1)->withCount(['ratings as average_rating'=>function($query){
                $query->select(DB::raw('coalesce(avg(rating),0)'));
            }])->orderByDesc('average_rating')->take(5)->get();
            $view->with(compact('productos_nuevos','sale_Productos','ratings_Productos'));
        });
    }
}
