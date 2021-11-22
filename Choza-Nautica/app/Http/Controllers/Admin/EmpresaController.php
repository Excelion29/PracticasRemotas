<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\empresa_detalles;
use Illuminate\Http\Request;

class EmpresaController extends Controller
{
    public function index(){
        return view('admin.Empresa.index');
    }

    public function update(Request $request, $id){               
        $campos=[
            'name'=>'required|string|max:255',
            'name_formal'=>'required|string|max:255',
            'telefono'=>'required|string|max:255',
            'horarios'=>'required|string|max:255',
            'correo'=>'required|string|max:255',
            'ruc'=>'required|string|max:255',
            'direccion'=>'required|string|max:255',
            'latitud'=>'required|string|max:1500',
            'longitud'=>'required|string|max:1500',
            'google_maps_link'=>'required|string|max:255',
            'descripcion'=>'required|string|max:1500',
            
        ];
        $mensaje=[
            'required'=>'Rellene el campo :attribute'
        ];
        $this->validate($request,$campos,$mensaje);
        $datosEmpresa = request()->except('_token','actualizar','_method');
        empresa_detalles::where('id','=',$id)->update($datosEmpresa);
        return redirect('dashboard/empresa')->with('mensaje','Datos Actualizados!');
    }
}
