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
}
