<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\combos;
use App\Models\Productos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CombosController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }
    public function index(){

        $datos['combos']=combos::join('users','users.id','=','combos.id_administrador')
        ->select('combos.*','users.name','users.apellidos')->orderByDesc('combos.id')
        ->paginate(5);
        return view('admin.Combos.index',$datos);
    }

    public function change_status(combos $combo){
         if($combo->estado == '1'){
             $combo->update(['estado'=>'0']);
             return redirect()->back();
         }else{
             $combo->update(['estado'=>'1']);
             return redirect()->back();
         }
    }

    public function create(){
        $combo = new combos();
        $productos = Productos::get();
        return view('admin.Combos.create',compact('combo','productos'));
    }
    public function store(Request $request,combos $combo){

        $campos=[
            'id_administrador'=>'required|integer',
            'nombre'=>'required|string|max:100',
            'descripcion'=>'required|string|max:1500',
            'precio'=>'required',
            'foto'=>'required|max:10000|mimes:jpeg,png,jpg',
        ];

        $mensaje=[
            'required'=>'Rellene el campo :attribute'
        ];

        $this->validate($request,$campos,$mensaje);

        // $datosCategorias = request()->all();
        $datosCombos = request()->except('_token','enviar');
        if($request->hasFile('foto')){
            $datosCombos['foto']=$request->file('foto')->store('uploads','public');
        }
        
        $combo->store_combos($datosCombos,$request);
        // return response()->json($datosCategorias);
        return redirect('dashboard/combos')->with('mensaje','Combo creado!');
    }
    public function show(combos $combos){

    }

    public function edit(combos $combo){
        $productos= Productos::get();
        return view('admin.Combos.edit', compact('combo','productos'));
    }

    public function update(Request $request,combos $combo){
        
        $campos=[
            'id_administrador'=>'required|integer',
            'nombre'=>'required|string|max:100',
            'descripcion'=>'required|string|max:1500',
            'precio'=>'required',
        ];  
        
        
        $mensaje=[
            'required'=>'Rellene el campo :attribute'
        ];
        $this->validate($request,$campos,$mensaje);

        $datosCombo = request()->except('_token','enviar','_method');
        
        if($request->hasFile('foto')){
            $campos=['foto'=>'required|max:10000|mimes:jpeg,png,jpg',];
            $combo = combos::findOrFail($combo['id']);
            Storage::delete('public/'.$combo->foto);
            $datosCombo['foto']=$request->file('foto')->store('uploads','public');
        }
        $combo->combos_update($datosCombo,$request);
        // return view('admin.categorias.edit', compact('categoria'));
        return redirect('dashboard/combos')->with('mensaje','Combo modificado!');
    }

    public function destroy($id){

        $combo = combos::findOrFail($id);
        
        if(storage::delete('public/'.$combo->foto)){
            combos::destroy($id);
        }

        return redirect('dashboard/combos')->with('mensaje','Combo Eliminado!');
    }
}
