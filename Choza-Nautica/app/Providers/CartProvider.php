<?php

namespace App\Providers;

use App\Models\Cart;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\ServiceProvider;

class CartProvider extends ServiceProvider
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
            $session_name = 'cart_id';
            $cart_id = Session::get($session_name);
            $cart = Cart::findOnCreateBySessionId($cart_id);
            Session::put($session_name,$cart->id);
            $view->with('cart',$cart);
        });
    }
}
