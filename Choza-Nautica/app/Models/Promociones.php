<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Promociones extends Model
{
    protected $fillable = [
        'nombre',
        'descuento',
        'descuento_fijo',
        'id_administrador',
        'fecha_inicio',
        'fecha_final',
        'tipo',
    ];

    public function user(){        
        return $this->belongsTo(User::class,'id_administrador');
    }

    public function promocion_estado(){
        if ($this->fecha_final > Carbon::now()) {
            return[
                'color' => 'danger',
                'text' => 'Expirado'
            ];
        } else {
            return [
                'color' => 'success',
                'text' => 'Vigente'
            ];
        }
    }
    public function productos(){
        return $this->belongsToMany(Productos::class);
    }

    public function promocion_update($request){
        $this->update($request->all()+[
            'descuento' => $request->descuento,
        ]);
        $this->productos()->sync($request->productos);
    }

    public function store_promocion($request){
        $promocion_prod = self::create($request->all()+[
            'descuento' => $request->descuento,
        ]);
        $promocion_prod->productos()->attach($request->productos);
    }
}
