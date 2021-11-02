<?php

namespace App\Http\Controllers;

use App\Models\Compra;
use App\Models\empresa_detalles;
use Illuminate\Http\Request;

class CompraController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }
    public function index(){
        $compras=Compra::select('compras.*')
        ->paginate(5);

        return view('admin.Ordenes.index',compact('compras'));
    }

    public function show(Compra $compra){
        $empresa=empresa_detalles::firstOrFail();
        $user = $compra->user;
        $detalles = $compra->compras_detalles;
        return view('admin.Ordenes.show',compact('compra','user','empresa','detalles'));
    }
    public function compra_update(Request $request, $id){
        $compra = Compra::find($id);
        $compra->update([
            'estado' => $request->value
        ]);         
        return $request->value;
    }
}
