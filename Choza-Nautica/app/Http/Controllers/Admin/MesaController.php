<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Mesas;
use Illuminate\Http\Request;

class MesaController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }
    public function index(){

        $datos['mesas']=Mesas::join('users','users.id','=','mesas.id_administrador')
        ->select('mesas.*','users.name')
        ->paginate(5);

        return view('admin.Mesas.index',$datos);
    }
}
