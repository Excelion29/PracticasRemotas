<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Productos extends Model
{
    protected $fillable = [
        'estado',
        'foto',
        'nombre',
        'precio',
        'foto',
    ];

    public function categorias(){
        return $this->belongsTo(categorias::class);
    }
}
