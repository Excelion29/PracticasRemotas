<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class combos extends Model
{
    use HasFactory;
    protected $fillable = [
        'foto',
        'estado',
        'nombre',
        'precio',
        'created_at',
    ];

    public function compras_detalles(){
        return $this->hasMany(compras_detalles::class,'id_combo');
    }
}
