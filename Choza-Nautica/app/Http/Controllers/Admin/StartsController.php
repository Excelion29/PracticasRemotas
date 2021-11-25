<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Productos;
use Illuminate\Http\Request;
use willvincent\Rateable\Rating;

class StartsController extends Controller
{
    public function succes(){
        $datos['producto']= Rating::select('ratings.*','productos.nombre as nombre','productos.foto as foto')->join('productos','productos.id','=','ratings.rateable_id')
        ->where('ratings.rating','>=',4)
        ->orderBYdesc('ratings.id')->paginate(6);
        return view('Admin.Starts.succes',$datos);
    }
    public function warning(){
        $datos['producto']= Rating::select('ratings.*','productos.nombre as nombre','productos.foto as foto')->join('productos','productos.id','=','ratings.rateable_id')
        ->where('ratings.rating','=',3)
        ->orderBYdesc('ratings.id')->paginate(6);
        return view('Admin.Starts.warning',$datos);
    }
    public function dunger(){
        $datos['producto']= Rating::select('ratings.*','productos.nombre as nombre','productos.foto as foto')->join('productos','productos.id','=','ratings.rateable_id')
        ->where('ratings.rating','<',3)
        ->orderBYdesc('ratings.id')->paginate(6);
        return view('Admin.Starts.dunger',$datos);
    }
}
