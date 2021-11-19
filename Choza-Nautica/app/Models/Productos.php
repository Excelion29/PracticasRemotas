<?php

namespace App\Models;

use willvincent\Rateable\Rateable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use willvincent\Rateable\Rating;

class Productos extends Model
{
    use Rateable;
    protected $fillable = [
        'estado',
        'nombre',
        'precio',
        'cantidad',
        'foto2',
        'foto3',
        'created_at',
        'id_categoria',
    ];

    public function add_stock(){
    }
    public function diminish_stock(){
    }
    public function categorias(){
        return $this->belongsTo(categorias::class,'id_categoria');
    }
    public function compras_detalles(){
        return $this->hasMany(compras_detalles::class,'id_producto');
    }
}
