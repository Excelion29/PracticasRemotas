<?php

namespace App\Http\Controllers;

use App\Models\categorias;
use Illuminate\Http\Request;

class MostrarCategorias extends Controller
{
    public function index(){
        $datos['categorias']= categorias::paginate();
        return view('store.index',$datos);
    }
}
