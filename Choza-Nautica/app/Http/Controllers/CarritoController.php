<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;

class CarritoController extends Controller
{
    public function update(Request $request){
        $cart = Cart::get_session_cart();
        $cart->my_update($request);
        return back();
    }
    
}
