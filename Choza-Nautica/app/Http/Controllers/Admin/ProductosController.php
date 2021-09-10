<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\categorias;
use App\Models\Productos;
use Illuminate\Http\Request;

class ProductosController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(){

        $datos['productos']=Productos::join('users','users.id','=','productos.id_administrador')
        ->join('categorias','categorias.id','=','productos.id_categoria')
        ->select('productos.*','users.name','categorias.nombre')
        ->paginate(1);

        return view('admin.productos.index',$datos);
    }

    public function create(){
        return view('admin.productos.create');
    }
    public function store(Request $request){

        $campos=[
            'nombre'=>'required|string|max:100',
            'descripcion'=>'required|string|max:1500',
            'precio'=>'required|float|max:1500',
            'foto'=>'required|max:10000|mimes:jpeg,png,jpg',
            'nombre'=>'required|string|max:1500',
        ];

        $mensaje=[
            'required'=>'Rellene el campo :attribute'
        ];

        $this->validate($request,$campos,$mensaje);

        // $datosCategorias = request()->all();
        $datosCategorias = request()->except('_token','enviar');

        if($request->hasFile('foto')){
            $datosCategorias['foto']=$request->file('foto')->store('uploads','public');
        }

        categorias::insert($datosCategorias);
        // return response()->json($datosCategorias);
        return redirect('dashboard/categorias')->with('mensaje','Categoria creada!');
    }


}
