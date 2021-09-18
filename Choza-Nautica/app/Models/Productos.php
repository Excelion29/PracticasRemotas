<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Productos extends Model
{
    use HasFactory;
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    protected $fillable = [
        'estado',
    ];
    
    public function listacategorias()
    {
        return $this->hasOne('App\Models\categorias', 'id', 'id_categoria');
    }
}
