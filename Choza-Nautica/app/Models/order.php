<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class order extends Model
{
    protected $fillable = [
        'cart_id',
        'cantidad',
        'foto',
        'precio', 
        'id_producto', 
        'id_combo', 
        'created_at',
    ];
    public function product(){
        return $this->belongsTo(Productos::class);
    }
}
