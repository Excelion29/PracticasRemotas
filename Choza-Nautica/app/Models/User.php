<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'apellidos',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function cliente(){
        return $this->hasOne(Clientes::class,'id_usuario');
    }
    public function ventas(){
        return $this->hasMany(Ventas::class);
    }
    // public function carts(){
    //     return $this->hasMany(Cart::class);
    // }
    public function compras(){
        return $this->hasMany(Compra::class,'user_id');
    }
    
    public function update_perfil($request){
        $this->update($request->all());
        $this->cliente()->update([
            'direccion'=>$request->direccion,
            'celular'=>$request->celular,
            'dni'=>$request->dni,
            'ruc'=>$request->ruc,
        ]);
    }
    public function roles(){        
        return $this->belongsTo(Roles::class,'id_rol');
    }
}