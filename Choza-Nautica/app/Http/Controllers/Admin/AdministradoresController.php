<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
Use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class AdministradoresController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');     
    }

    public function index(){

        $datos['users']= User::join('roles','roles.id','=','users.id_rol')
        ->select('users.*','roles.nombre')
        ->where('users.id_rol','=','1')
        ->where('users.estado','=','1')
        ->paginate(5);

        return view('admin.Users.Admins',$datos);
    }
    public function create(){
        return view('admin.Users.rol');
       
    }
    public function store(Request $request){

         $campos=[
             'name'=>'required|string|max:100',
             'apellidos'=>'required|string|max:1500',
             'email'=>'required|string|max:1500',
             'celular'=>'required|string|max:1500',
             'password'=>'required|string|max:1500',
             'id_rol'=>'required|string|max:1500',
         ];
         $mensaje=[
             'required'=>'Rellene el campo :attribute'
         ];
         
        
        $this->validate($request,$campos,$mensaje);

        // $datosCategorias = request()->all();
        $datosCliente = request()->except('_token','enviar');
        User::insert([
            'id_rol' => 1,
            'name' => $datosCliente['name'],
            'apellidos' => $datosCliente['apellidos'],
            'celular' => $datosCliente['celular'],
            'email' => $datosCliente['email'],
            'password' => Hash::make($datosCliente['password']),
        ]);
        // return response()->json($datosCategorias);
        
        return redirect('dashboard/administrador')->with('mensaje','Administrador creado!');
    }

    public function edit($id){
        $user = User::findOrFail($id);
         return view('admin.Users.rol', compact('user'));
    }

    public function update($id){
        $datoscliente = request()->except('_token','enviar','_method');
        
        User::where('id','=',$id)->update($datoscliente);
        return redirect('dashboard/administrador')->with('mensaje','Administrador desabilitado!');
    }

}