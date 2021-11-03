<?php

namespace App\Http\Controllers;

use App\Models\Compra;
use App\Models\Costo_x_deliverys;
use App\Models\payment_platforms;
use App\Models\User;
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
    public function my_perfil(){
        $perfil = auth()->user();
        return view('MyAccount.perfil',compact('perfil'));
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
    public function my_reserves(){
        return view('MyAccount.reservaciones');
    }
    public function mis_deseos(){
        return view('MyAccount.deseos');
    }
    
    public function change_password(){   
        $perfil = auth()->user();  
        return view('MyAccount.change_pasword',compact('perfil'));
    }
}

