<?php

namespace App\Http\Controllers;

use App\Models\Costo_x_deliverys;
use App\Models\payment_platforms;
use Illuminate\Http\Request;

class MyAccountController extends Controller
{
    public function __construct()
    {
        $this->middleware('client_auth');     
    }
    public function my_account(){
        return view('MyAccount.index');
    }
    public function pagar(){
        $datos['Costo_x_deliverys'] = Costo_x_deliverys::all();
        $datos['Payments'] = payment_platforms::all();
        return view('shop.index',$datos);
    }
    public function my_orders(){
        $orders = auth()->user()->compras;
        return view('MyAccount.orders',compact('orders'));
    }
}
