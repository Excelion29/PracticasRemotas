<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class combos extends Model
{
    protected $fillable = [
        'id_administrador',
        'nombre',
        'descripcion',
        'precio',
        'foto',
        'estado',
        'created_at',
    ];

    public function compras_detalles(){
        return $this->hasMany(compras_detalles::class,'id_combo');
    }
    public function productos(){
        return $this->belongsToMany(Productos::class);
    }
    public static function store_combos($datosCombos,$request){
        $combos_prod = self::create($datosCombos,$request);
        $combos_prod->productos()->attach($request->productos);
    }
    public function combos_update($datosCombo,$request){
        $this->update($datosCombo);
        $this->productos()->sync($request->productos);
    }
}
