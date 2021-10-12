<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class moneda extends Model
{
    protected $primaryKey = 'iso';
    public $incrementing = false;
    protected $fillable=[
        'iso',
    ];
}
