<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\categorias;
use App\Models\Productos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductosController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }
    public function index(){

        $datos['productos']=Productos::join('users','users.id','=','productos.id_administrador')
        ->join('categorias','categorias.id','=','productos.id_categoria')
        ->select('productos.*','users.name','categorias.nombre as categoria')->orderByDesc('id')
        ->paginate(5);
        return view('admin.productos.index',$datos);
    }
    
    public function change_status(Productos $producto){
        if($producto->estado == '1'){
            $producto->update(['estado'=>'0']);
            return redirect()->back();
        }else{
            $producto->update(['estado'=>'1']);
            return redirect()->back();
        }
    }
    public function create(){
        $datos['productos'] = new Productos();
        $datos['categorias'] = categorias::pluck('nombre','id');
        return view('admin.productos.create',$datos);
    }

    public function store(Request $request){

        $campos=[
            'nombre'=>'required|string|max:100',
            'detalles'=>'required|string|max:1500',
            'descripcion'=>'required|string|max:1500',
            'id_categoria'=>'required|string|max:1500',
            'foto'=>'required|max:10000|mimes:jpeg,png,jpg',
            'foto2'=>'required|max:10000|mimes:jpeg,png,jpg',
            'foto3'=>'required|max:10000|mimes:jpeg,png,jpg',
        ];

        $mensaje=[
            'required'=>'Rellene el campo :attribute'
        ];

        $this->validate($request,$campos,$mensaje);

        // $datosCategorias = request()->all();
        $datosProductos = request()->except('_token','enviar');

        if($request->hasFile('foto')){
            $datosProductos['foto']=$request->file('foto')->store('uploads','public');
        }
        if($request->hasFile('foto2')){
            $datosProductos['foto2']=$request->file('foto2')->store('uploads','public');
        }
        if($request->hasFile('foto3')){
            $datosProductos['foto3']=$request->file('foto3')->store('uploads','public');
        }
       

        Productos::insert($datosProductos);
        // return response()->json($datosCategorias);
        return redirect('dashboard/productos')->with('mensaje','Producto creado!');
    }
    public function show(Productos $productos){

    }
    //
    public function edit($id){
            $datos['producto'] = Productos::join('categorias','categorias.id','=','productos.id_categoria')
            ->select('productos.*','categorias.nombre as categorianame')
            ->findOrFail($id);
            $datos['categorias'] = categorias::pluck('nombre','id');
         return view('admin.Productos.edit',$datos);
    }

    public function update(Request $request, $id){
        
        $campos=[
            'nombre'=>'required|string|max:100',
            'detalles'=>'required|string|max:1500',
            'descripcion'=>'required|string|max:1500',
            'id_categoria'=>'required|string|max:1500',
            
        ];

        $mensaje=[
            'required'=>'Rellene el campo :attribute'
        ];
        if($request->hasFile('foto')){
            
            $campos=['foto'=>'required|max:10000|mimes:jpeg,png,jpg',];
        }
        $this->validate($request,$campos,$mensaje);


        $datosproductos = request()->except('_token','enviar','_method');
        
        if($request->hasFile('foto')){
            $producto = Productos::findOrFail($id);

            Storage::delete('public/'.$producto->foto);

            $datosproductos['foto']=$request->file('foto')->store('uploads','public');
        }

        if($request->hasFile('foto2')){
            $producto = Productos::findOrFail($id);

            Storage::delete('public/'.$producto->foto2);

            $datosproductos['foto2']=$request->file('foto2')->store('uploads','public');
        }
        if($request->hasFile('foto3')){
            $producto = Productos::findOrFail($id);

            Storage::delete('public/'.$producto->foto3);

            $datosproductos['foto3']=$request->file('foto3')->store('uploads','public');
        }

        Productos::where('id','=',$id)->update($datosproductos);

        $producto = Productos::findOrFail($id);
        // return view('admin.categorias.edit', compact('categoria'));
        return redirect('dashboard/productos')->with('mensaje','Producto modificado!');
    }
    //


    public function destroy($id){

        $producto = Productos::findOrFail($id);
        
        if(storage::delete('public/'.$producto->foto)){
            Productos::destroy($id);
        }

        return redirect('dashboard/productos')->with('mensaje','Producto Eliminado!');
    }
}
