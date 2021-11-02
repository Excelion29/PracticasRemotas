<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class compras_detalles extends Model
{
    protected $fillable = [
        'compras_id',
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
    public function total(){
            return $this->precio;
    }
}
