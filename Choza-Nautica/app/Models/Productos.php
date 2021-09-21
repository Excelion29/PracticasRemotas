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
        'foto',
        'nombre',
        'precio',
        'foto',
    ];
    public function product(){
        return $this->belongsTo(Productos::class);
    }
}
