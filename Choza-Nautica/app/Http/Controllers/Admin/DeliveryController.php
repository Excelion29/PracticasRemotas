<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Costo_x_deliverys;
use Illuminate\Http\Request;

class DeliveryController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }
    public function index()
    {
        $datos['Costo_x_deliverys']=Costo_x_deliverys::join('users','users.id','=','Costo_x_deliverys.id_administrador')
        ->select('Costo_x_deliverys.*','users.name')->orderByDesc('id')
        ->paginate(5);
        return view('admin.Delivery.index',$datos);
    }
    public function change_status(Costo_x_deliverys $delivery){
        if($delivery->estado == '1'){
            $delivery->update(['estado'=>'0']);
            return redirect()->back();
        }else{
            $delivery->update(['estado'=>'1']);
            return redirect()->back();
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.Delivery.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $campos=[
            'id_administrador'=>'required|integer',
            'Distrito'=>'required|string|max:100',
            'precio'=>'required|string|max:1500',
        ];

        $mensaje=[
            'required'=>'Rellene el campo :attribute'
        ];

        $this->validate($request,$campos,$mensaje);

        // $datosCategorias = request()->all();
        $datosDelivery = request()->except('_token','enviar');

        Costo_x_deliverys::insert($datosDelivery);
        // return response()->json($datosCategorias);
        return redirect('dashboard/Delivery')->with('mensaje','Delivery por distrito creado!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Costo_x_deliverys  $costo_x_deliverys
     * @return \Illuminate\Http\Response
     */
    public function show(Costo_x_deliverys $costo_x_deliverys)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Costo_x_deliverys  $costo_x_deliverys
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $delivery = Costo_x_deliverys::findOrFail($id);
        return view('admin.Delivery.edit', compact('delivery'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Costo_x_deliverys  $costo_x_deliverys
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $campos=[
            'id_administrador'=>'required|integer',
            'Distrito'=>'required|string|max:100',
            'precio'=>'required|string|max:1500',
        ];

        $mensaje=[
            'required'=>'Rellene el campo :attribute'
        ];
        
        $this->validate($request,$campos,$mensaje);


        $datosDelivery = request()->except('_token','enviar','_method');

        Costo_x_deliverys::where('id','=',$id)->update($datosDelivery);
        // return view('admin.categorias.edit', compact('categoria'));
        return redirect('dashboard/Delivery')->with('mensaje','Delivery por distrito modificado!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Costo_x_deliverys  $costo_x_deliverys
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Costo_x_deliverys::destroy($id);

        return redirect('dashboard/Delivery')->with('mensaje','Delivery por distrito Eliminado!');
    }
}
