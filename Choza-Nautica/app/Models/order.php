<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class order extends Model
{
    protected $fillable = [
        'cart_id',
        'cantidad',
        'precio', 
        'id_producto', 
        'id_combo', 
    ];
    public function product(){
        return $this->belongsTo(Productos::class,'id_producto');
    }
    public function combo(){
        return $this->belongsTo(combos::class,'id_combo');
    }
}
