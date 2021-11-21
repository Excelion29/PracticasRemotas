<?php

namespace App\Models;

use willvincent\Rateable\Rateable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use willvincent\Rateable\Rating;

class Productos extends Model
{
    use Rateable;
    protected $fillable = [
        'estado',
        'nombre',
        'precio',
        'cantidad',
        'foto2',
        'foto3',
        'created_at',
        'id_categoria',
    ];

    public function add_stock(){
    }
    public function diminish_stock(){
    }
    public function promociones(){
       return $this->belongsToMany(Promociones::class);
    }
    public function getTotalDiscountAttribute(){
        $total_porcentage = 0;
        $monto_total =0;
        
        foreach ($this->promociones as $key => $promocion) {
            if($promocion->tipo == 'descuento'){
                $total_porcentage += $promocion->descuento;
            }
            elseif($promocion->tipo == 'descuento_fijo'){
                $monto_total += $promocion->descuento_fijo;
            }
        } 
        if ($monto_total == 0) {
            return round(($total_porcentage) , 2);
        }
        else{            
            return round(($total_porcentage)+(100/($this->precio/$monto_total)), 2);
        }
    }

    public function getDiscountAttribute(){
        $total_porcentage = 0;
        $monto_total =0;
        foreach ($this->promociones as $key => $promocion) {
           if($promocion->tipo == 'descuento'){
                $total_porcentage += $promocion->descuento;
           }
           elseif($promocion->tipo == 'descuento_fijo'){
            $monto_total += $promocion->descuento_fijo;
            }
        }    
        $total = ($this->precio-($this->precio*($total_porcentage/100))-$monto_total);    
        return $total;
    }

     public function has_promociones(){
         $this->promociones;
         if ($this->promociones->count() > 0) {
             return true;
         } else{
             return false;
        }
     }


    public function categorias(){
        return $this->belongsTo(categorias::class,'id_categoria');
    }
    public function compras_detalles(){
        return $this->hasMany(compras_detalles::class,'id_producto');
    }
}
