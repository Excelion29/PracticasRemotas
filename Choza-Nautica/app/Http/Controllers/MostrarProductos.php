<?php

namespace App\Http\Controllers;

use App\Models\Productos;
use App\Models\tipo_compra;
use Illuminate\Http\Request;
use willvincent\Rateable\Rateable;

class MostrarProductos extends Controller
{
    use Rateable;
    public function show($id){
        $datos['productos']= Productos::join('categorias','categorias.id','=','productos.id_categoria')
        ->select('productos.*','categorias.nombre as categoria')
        ->where('productos.id_categoria','=',$id)
        ->where('productos.cantidad','>','0')
        ->where('productos.estado','=','1')
        ->paginate(6);
        return view('store.productos',$datos);
    }
    public function products_json(){
        $productos = Productos::where('estado','1')->pluck('nombre');
        return $productos;
    }
    public function search_products(Request $request){
        $datos['search'] = Productos::where('estado','1')->where("nombre","LIKE","%$request->search_products%")->get();
        $datos['productos']= Productos::join('categorias','categorias.id','=','productos.id_categoria')
        ->select('productos.*','categorias.nombre as categoria')
        ->where('productos.cantidad','>','0')
        ->where('productos.estado','1')
        ->where("productos.nombre","LIKE","%$request->search_products%")
        ->paginate(5);
        return view('store.productos',$datos);
    }
    public function products_calificar($id){
        $datos['productos']= Productos::join('categorias','categorias.id','=','productos.id_categoria')
        ->select('productos.*','categorias.nombre as categoria')
        ->where('productos.cantidad','>','0')
        ->where('productos.estado','1')
        ->where('productos.id','=',$id)->firstOrFail();
        return view('store.calificar_product',$datos);
    }

    public function rating_product(Request $request, Productos $product)
    {   $product->rate($request->rate,$request->comentario);
        return back();
        // dd($product->ratings);
    }
}
