<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\categorias;
use App\Models\Productos;
use Illuminate\Http\Request;

class ProductosController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(){

        $datos['productos']=Productos::join('users','users.id','=','productos.id_administrador')
        ->select('productos.*','users.name')
        ->paginate(1);

        return view('admin.productos.index',$datos);
    }


}
