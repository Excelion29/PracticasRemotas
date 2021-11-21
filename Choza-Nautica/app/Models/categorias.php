<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class categorias extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'nombre',
        'estado',
        'created_at',
        
    ];
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function ListaProductos()
    {
        return $this->hasMany(Productos::class);
    }
}
