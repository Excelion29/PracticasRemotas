<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\categorias;
use GuzzleHttp\Middleware;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CategoriaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(){

        $datos['categorias']=categorias::paginate(1);

        return view('admin.categorias.index',$datos);
    }

    public function create(){
        return view('admin.categorias.create');
    }
    public function store(Request $request){

        $campos=[
            'nombre'=>'required|string|max:100',
            'descripcion'=>'required|string|max:1500',
            'foto'=>'required|max:10000|mimes:jpeg,png,jpg',
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
    public function show(categorias $categorias){

    }

    public function edit($id){
        $categoria = categorias::findOrFail($id);
         return view('admin.categorias.edit', compact('categoria'));
    }

    public function update(Request $request, $id){
        
        $campos=[
            'nombre'=>'required|string|max:100',
            'descripcion'=>'required|string|max:1500',
            
        ];

        $mensaje=[
            'required'=>'Rellene el campo :attribute'
        ];
        if($request->hasFile('foto')){
            
            $campos=['foto'=>'required|max:10000|mimes:jpeg,png,jpg',];
        }
        $this->validate($request,$campos,$mensaje);


        $datosCategorias = request()->except('_token','enviar','_method');
        
        if($request->hasFile('foto')){
            $categoria = categorias::findOrFail($id);

            Storage::delete('public/'.$categoria->foto);

            $datosCategorias['foto']=$request->file('foto')->store('uploads','public');
        }

        categorias::where('id','=',$id)->update($datosCategorias);

        $categoria = categorias::findOrFail($id);
        // return view('admin.categorias.edit', compact('categoria'));
        return redirect('dashboard/categorias')->with('mensaje','Categoria modificado!');
    }

    public function destroy($id){

        $categoria = categorias::findOrFail($id);
        
        if(storage::delete('public/'.$categoria->foto)){
            categorias::destroy($id);
        }

        return redirect('dashboard/categorias')->with('mensaje','Categoria Eliminada!');
    }
}
