<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Productos extends Model
{
    protected $fillable = [
        'estado',
        'nombre',
        'precio',
        'foto2',
        'foto3',
        'created_at',
        'id_categoria',
    ];

    public function categorias(){
        return $this->belongsTo(categorias::class,'id_categoria');
    }
    public function productos_destacados(){
        return 1;
    }
}
