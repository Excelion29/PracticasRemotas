<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\combos;
use App\Models\order;
use App\Models\Productos;
use Illuminate\Http\Request;

class ObtenerOrder extends Controller
{
    
    public function store(Request $request, Productos $product){
        $cart = Cart::get_session_cart();
        $cart->my_store($product, $request);
        return back();
    }
    public function store_a_product(Productos $product){
        $cart = Cart::get_session_cart();
        $cart->store_a_product($product);
        return back();
    }
    public function store_combo(Request $request, combos $combo){
        $cart = Cart::get_session_cart();
        $cart->my_store_combo($combo, $request);
        return back();
    }
    public function store_a_combo(combos $combo){
        $cart = Cart::get_session_cart();
        $cart->store_a_product_combo($combo);
        return back();
    }
    public function update(Request $request,order $DetalleCommpra){

    }
    public function destroy(order  $DetalleCommpra){
        $DetalleCommpra->delete();
        return back();
    }
}
