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
    public static function store_combos($datosCombos){
        $combos_prod = self::create($datosCombos);
        $combos_prod->productos()->attach($datosCombos['productos']);
    }
    public function combos_update($datosCombos){
        $this->update($datosCombos);
        $this->productos()->sync($datosCombos['productos']);
    }
}
