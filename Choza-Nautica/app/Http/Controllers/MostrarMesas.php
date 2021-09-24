<?php

namespace App\Http\Controllers;

use App\Models\Mesas;
use Illuminate\Http\Request;

class MostrarMesas extends Controller
{
    public function index(){
        $datos['mesas']= Mesas::select('mesas.*')
        ->where('mesas.estado','=','1')
        ->paginate(5);
        return view('store.reservaciones',$datos);
    }
}
