<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Mesas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
    public function create(){
        return view('admin.Mesas.create');
    }
    public function store(Request $request){

        $campos=[
            'id_administrador'=>'required|integer',
            'nombre'=>'required|string|max:100',
            'capacidad'=>'required|string|max:1500',
            'precio'=>'required|string|max:1500',
            'foto'=>'required|max:10000|mimes:jpeg,png,jpg',
        ];

        $mensaje=[
            'required'=>'Rellene el campo :attribute'
        ];

        $this->validate($request,$campos,$mensaje);

        // $datosCategorias = request()->all();
        $datosMesas = request()->except('_token','enviar');

        if($request->hasFile('foto')){
            $datosMesas['foto']=$request->file('foto')->store('uploads','public');
        }

        Mesas::insert($datosMesas);
        // return response()->json($datosCategorias);
        return redirect('dashboard/mesas')->with('mensaje','Mesa creada!');
    }
    public function show(){

    }

    public function edit($id){
        $mesa = Mesas::findOrFail($id);
         return view('admin.Mesas.edit', compact('mesa'));
    }

    public function update(Request $request, $id){
        
        $campos=[
            'id_administrador'=>'required|integer',
            'nombre'=>'required|string|max:100',
            'capacidad'=>'required|string|max:1500',
            'precio'=>'required|string|max:1500',
        ];

        $mensaje=[
            'required'=>'Rellene el campo :attribute'
        ];
        if($request->hasFile('foto')){
            
            $campos=['foto'=>'required|max:10000|mimes:jpeg,png,jpg',];
        }
        $this->validate($request,$campos,$mensaje);


        $datosMesas = request()->except('_token','enviar','_method');
        
        if($request->hasFile('foto')){
            $mesa = Mesas::findOrFail($id);

            Storage::delete('public/'.$mesa->foto);

            $datosMesas['foto']=$request->file('foto')->store('uploads','public');
        }

        Mesas::where('id','=',$id)->update($datosMesas);

        $mesa = Mesas::findOrFail($id);
        // return view('admin.categorias.edit', compact('categoria'));
        return redirect('dashboard/mesas')->with('mensaje','Mesa modificado!');
    }

    public function destroy($id){

        $categoria = Mesas::findOrFail($id);
        
        if(storage::delete('public/'.$categoria->foto)){
            Mesas::destroy($id);
        }

        return redirect('dashboard/mesas')->with('mensaje','Mesa Eliminada!');
    }
}
