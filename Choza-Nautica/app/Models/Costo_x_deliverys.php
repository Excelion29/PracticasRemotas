<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Costo_x_deliverys extends Model
{
    use HasFactory;
    protected $fillable = [
        'Distrito',
        'estado',
        'Precio'
    ];
}
