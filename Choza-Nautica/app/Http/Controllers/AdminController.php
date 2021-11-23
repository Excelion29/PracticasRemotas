<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Compra;
use App\Models\Productos;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }
    public function index(){
        $data = Compra::compras_mes();  
        $data_prod = Productos::productos_mes();
        $data_prod_desc =  Productos::productos_destacados();
        $porcentaje =  Cart::detalles_progress();
        return view('Admin.chars',compact('data','data_prod','data_prod_desc','porcentaje'));
    }
}
