<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Productos;
use Illuminate\Http\Request;

class ObtenerOrder extends Controller
{
    public function store(Request $request){
        $product = Productos::find($request->id_producto);
        $cart = Cart::get_session_cart();
        $cart->my_store($product, $request);
        return back();
    }
    public function update(Request $request,DetalleCommpra $DetalleCommpra){

    }
    public function destroy(DetalleCommpra  $DetalleCommpra){

    }
}
