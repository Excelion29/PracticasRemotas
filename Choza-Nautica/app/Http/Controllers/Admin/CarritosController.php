<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\order;
use Illuminate\Http\Request;

class CarritosController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    // public function index(){

    //     $datos['carritos']=Cart::join('users','users.id','=','carts.user_id')
    //     ->select('carts.*','users.name')
    //     ->paginate(5);

    //     return view('admin.carritos.index',$datos);
    // }

    // public function change_status(Cart $carrito){
    //     if($carrito->estado == '1'){
    //         $carrito->update(['estado'=>'0']);
    //         return redirect()->back();
    //     }else{
    //         $carrito->update(['estado'=>'1']);
    //         return redirect()->back();
    //     }
    // }
    // public function show($id){
    //     $datos['ordenes']=order::join('carts','carts.id','=','orders.cart_id')
    //     ->join('productos','productos.id','=','orders.id_producto')
    //     ->select('orders.*','productos.nombre')
    //     ->where('cart_id','=',$id)
    //     ->paginate(5);

    //     return view('admin.carritos.productos',$datos);
    // }
    // public function show_combo($id){
    //     $datos['ordenes']=order::join('carts','carts.id','=','orders.cart_id')
    //     ->join('combos','combos.id','=','orders.id_combo')
    //     ->select('orders.*','combos.nombre')
    //     ->where('cart_id','=',$id)
    //     ->paginate(5);

    //     return view('admin.carritos.combo',$datos);
    // }
}
