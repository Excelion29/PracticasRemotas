<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class EmpleadosController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }
    public function index(){

        $datos['users']= User::join('roles','roles.id','=','users.id_rol')
        ->select('users.*','roles.nombre')->orderByDesc('id')
        ->where('users.id_rol','=','3')        
        ->where('users.estado','=','1')
        ->paginate(5);

        return view('admin.Users.empleados',$datos);
    }
    public function create(){
        return view('admin.Users.rol');
    }
    public function store(Request $request){

        $campos=[
            'name'=>'required|string|max:100',
            'apellidos'=>'required|string|max:1500',
            'email'=>'required|email:rfc,dns',
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
            'id_rol' => 3,
            'name' => $datosCliente['name'],
            'apellidos' => $datosCliente['apellidos'],
            'celular' => $datosCliente['celular'],
            'email' => $datosCliente['email'],
            'password' => Hash::make($datosCliente['password']),
        ]);
        // return response()->json($datosCategorias);
        return redirect('dashboard/empleado')->with('mensaje','Empleado creado!');
    }

    public function edit($id){
        $user = User::findOrFail($id);
         return view('admin.Users.rol', compact('user'));
    }

    public function update($id){
        $datoscliente = request()->except('_token','enviar','_method');
        
        User::where('id','=',$id)->update($datoscliente);
        return redirect('dashboard/empleado')->with('mensaje','Empleado desabilitado!');
    }

}
