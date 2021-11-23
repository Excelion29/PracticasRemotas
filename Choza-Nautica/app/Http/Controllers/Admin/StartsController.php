<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Productos;
use Illuminate\Http\Request;

class StartsController extends Controller
{
    public function succes(){
        $datos['productos']= Productos::select('productos.*')->join('ratings','ratings.rateable_id','=','productos.id')
        ->where('ratings.rating','>=',4)
        ->orderBYdesc('productos.id')->paginate(6);
        return view('Admin.Starts.succes',$datos);
    }
    public function warning(){
        $datos['productos']= Productos::select('productos.*')->join('ratings','ratings.rateable_id','=','productos.id')
        ->where('ratings.rating','=',3)
        ->orderBYdesc('productos.id')->paginate(6);
        return view('Admin.Starts.warning',$datos);
    }
    public function dunger(){
        $datos['productos']= Productos::select('productos.*')->join('ratings','ratings.rateable_id','=','productos.id')
        ->where('ratings.rating','<',3)
        ->orderBYdesc('productos.id')->paginate(6);
        return view('Admin.Starts.dunger',$datos);
    }
}
