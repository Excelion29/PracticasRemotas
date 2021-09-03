<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\combos;
use Illuminate\Http\Request;
use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Storage;


class CombosController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(){

        $datos['combos']=combos::join('users','users.id','=','combos.id_administrador')
        ->select('combos.*','users.name')
        ->paginate(1);
        return view('admin.Combos.index',$datos);
    }

    public function create(){
        return view('admin.Combos.create');
    }
    public function store(Request $request){

        $campos=[
            'id_administrador'=>'required|integer',
            'nombre'=>'required|string|max:100',
            'descripcion'=>'required|string|max:1500',
            'precio'=>'required|string|max:1500',
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

        combos::insert($datosCombos);
        // return response()->json($datosCategorias);
        return redirect('dashboard/combos')->with('mensaje','Combo creado!');
    }
    public function show(combos $combos){

    }

    public function edit($id){
        $combos = combos::findOrFail($id);
         return view('admin.Combos.edit', compact('combos'));
    }

    public function update(Request $request, $id){
        
        $campos=[
            'id_administrador'=>'required|integer',
            'nombre'=>'required|string|max:100',
            'descripcion'=>'required|string|max:1500',
            'precio'=>'required|string|max:1500',
            
        ];

        $mensaje=[
            'required'=>'Rellene el campo :attribute'
        ];
        if($request->hasFile('foto')){
            
            $campos=['foto'=>'required|max:10000|mimes:jpeg,png,jpg',];
        }
        $this->validate($request,$campos,$mensaje);


        $datosCombos = request()->except('_token','enviar','_method');
        
        if($request->hasFile('foto')){
            $combos = combos::findOrFail($id);

            Storage::delete('public/'.$combos->foto);

            $datosCombos['foto']=$request->file('foto')->store('uploads','public');
        }

        combos::where('id','=',$id)->update($datosCombos);

        $combos = combos::findOrFail($id);
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
