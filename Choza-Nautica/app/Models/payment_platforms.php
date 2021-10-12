<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class payment_platforms extends Model
{
    protected $fillable = [
        'name',
        'estado',
    ];

}
