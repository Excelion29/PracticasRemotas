<?php

namespace App\Http\Controllers;

use App\Models\combos;
use Illuminate\Http\Request;

class MostraCombos extends Controller
{
    public function index(){
        $datos['combos']= combos::select('combos.*')
        ->where('combos.estado','=','1')
        ->paginate(6);
        return view('store.combos',$datos);
    }
}
