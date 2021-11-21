<?php

namespace App\Http\Controllers;

use App\Models\Promociones;
use Illuminate\Http\Request;
use App\Models\Productos;
use Illuminate\Support\Facades\Storage;

class PromocionesController extends Controller
{

    public function __construct()
    {
        $this->middleware('admin');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datos['promociones'] = Promociones::select()
        ->paginate(5);
        return view('admin.Promociones.index',$datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $promocione = new Promociones();
        $productos= Productos::get();
        return view('admin.Promociones.create',compact('promocione','productos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Promociones $promocione)
    {

        $campos=[
            'id_administrador'=>'required|string|max:100',
            'nombre'=>'required|string|max:100',
            'fecha_inicio'=>'required|date|max:1500',
            'fecha_final'=>'required|date|max:1500',
            'tipo'=>'required',
        ];
        $mensaje=[
            'required'=>'Rellene el campo :attribute'
        ];
        $this->validate($request,$campos,$mensaje);
        
        $promocione->store_promocion($request);

        return redirect('dashboard/promociones')->with('mensaje','Promoción creado!');

    }
  
    public function show(Promociones $promociones)
    {
        //
    }
    public function edit(Promociones $promocione)
    {
        $productos= Productos::get();
        return view('admin.Promociones.edit',compact('promocione','productos'));
    }

    public function update(Request $request,Promociones $promocione)
    {
        $campos=[
            'nombre'=>'required|string|max:100',
            'fecha_inicio'=>'required|date|max:1500',
            'fecha_final'=>'required|date|max:1500',
            'productos'=>'required',
            'tipo'=>'required',
        ];

        $mensaje=[
            'required'=>'Rellene el campo :attribute'
        ];
        $this->validate($request,$campos,$mensaje);
        
        $promocione->promocion_update($request);
        return redirect('dashboard/promociones')->with('mensaje','Promociones modificado!');
    }

    public function destroy($id)
    {
        $promociones = Promociones::findOrFail($id);
        
        Promociones::destroy($id);
        return redirect('dashboard/promociones')->with('mensaje','Promociones Eliminado!');
    }
}
