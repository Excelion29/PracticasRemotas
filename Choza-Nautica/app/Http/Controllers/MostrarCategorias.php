<?php

namespace App\Http\Controllers;

use App\Models\categorias;
use Illuminate\Http\Request;

class MostrarCategorias extends Controller
{
    public function index(){
        $datos['categorias']= categorias::select('categorias.*')
        ->where('categorias.estado','=','1')
        ->paginate(5);
        return view('store.index',$datos);
    }
    public function categorias_json(){
        $categorias = categorias::where('estado','1')->pluck('nombre');
        return $categorias;
    }
    public function search_categorias(Request $request){
        $datos['search'] = categorias::where('estado','1')->where("nombre","LIKE","%$request->search_category%")->get();
        $datos['categorias']= categorias::select('categorias.*')
        ->where('estado','1')
        ->where("nombre","LIKE","%$request->search_category%")
        ->paginate(5);
        return view('store.index',$datos);
    }
}
