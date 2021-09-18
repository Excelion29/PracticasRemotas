<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class categorias extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'estado',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function ListaProductos()
    {
        return $this->hasMany('App\Models\Productos', 'id_categoria', 'id');
    }
}
