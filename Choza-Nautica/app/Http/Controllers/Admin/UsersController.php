<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ChangePasswordRequest;
Use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }
    public function index(){

        $datos['users']= User::join('roles','roles.id','=','users.id_rol')
        ->select('users.*','roles.nombre')
        ->where('users.id_rol','=','2')
        ->where('users.estado','=','1')
        ->paginate(5);

        return view('admin.Users.clientes',$datos);
    }
    public function create(){
        return view('admin.Users.rol');
    }
    public function store(Request $request){

        $campos=[
            'name'=>'required|string|max:100',
            'apellidos'=>'required|string|max:1500',
            'email'=>'required|string|max:1500',
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
            'name' => $datosCliente['name'],
            'apellidos' => $datosCliente['apellidos'],
            'celular' => $datosCliente['celular'],
            'email' => $datosCliente['email'],
            'password' => Hash::make($datosCliente['password']),
        ]);
        // return response()->json($datosCategorias);
        return redirect('dashboard/cliente')->with('mensaje','Cliente creado!');
    }

    public function edit($id){
        $user = User::findOrFail($id);
         return view('admin.Users.rol', compact('user'));
    }

    public function update($id){
        $datoscliente = request()->except('_token','enviar','_method');
        
        User::where('id','=',$id)->update($datoscliente);
        return redirect('dashboard/cliente')->with('mensaje','Cliente desabilitado!');
    }

    public function update_perfil(Request $request, User $user){
        $user->update_perfil($request);
        return back();
    }
    
    public function update_password(ChangePasswordRequest $request, User $user){
        $user->update(['password' => Hash::make($request['password'])]);
        return back();
    }
}
