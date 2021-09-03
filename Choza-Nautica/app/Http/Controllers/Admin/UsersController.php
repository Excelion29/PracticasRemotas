<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
Use App\Models\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(){

        $users= User::join('roles','roles.id','=','users.id_rol')
        ->select('users.*','roles.nombre')
        ->where('users.id_rol','=','2')
        ->paginate();

        return view('Admin.users.clientes', compact('users'))->with('i',(request()->input('page',1)-1)*$users->perpage());
    }
}
