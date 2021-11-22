<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class empresa_detalles extends Model
{
     protected $fillable = [
         'name',
         'descripcion',
         'direccion',
         'horarios',
         'correo',
         'telefono',          
         'ruc',
         'latitud',
         'longitud',
         'google_maps_link',
     ];
}
