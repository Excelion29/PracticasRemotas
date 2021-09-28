<?php

namespace App\Http\Controllers;

use App\Models\Costo_x_deliverys;
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
        $datos['Costo_x_deliverys'] = Costo_x_deliverys::get();
        return view('shop.index',$datos);
    }
}
