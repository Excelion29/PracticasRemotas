<?php

namespace App\Http\Controllers;

use App\Models\Mesas;
use Illuminate\Http\Request;

class MostrarMesas extends Controller
{
    public function index(){
        $datos['mesas']= Mesas::select('mesas.*')
        ->where('mesas.estado','=','1')
        ->paginate(6);
        return view('store.reservaciones',$datos);
    }
}
