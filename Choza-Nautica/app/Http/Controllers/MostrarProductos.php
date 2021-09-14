<?php

namespace App\Http\Controllers;

use App\Models\Productos;
use Illuminate\Http\Request;

class MostrarProductos extends Controller
{
    public function show($id){
        $datos['productos']= Productos::join('categorias','categorias.id','=','productos.id_categoria')
        ->select('productos.*','categorias.nombre as categoria')
        ->where('productos.id_categoria','=',$id)
        ->paginate(5);
        return view('store.productos',$datos);
    }
}
