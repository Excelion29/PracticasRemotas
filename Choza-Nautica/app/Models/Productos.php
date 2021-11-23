<?php

namespace App\Models;

use willvincent\Rateable\Rateable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
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
    public function combos(){
        return $this->belongsToMany(combos::class);
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


    public static function productos_mes(){
        $data_prod = self::SELECT(DB::raw('count(id) as `cantidad`'),DB::raw('YEAR(date_created) as Año, MONTHNAME(date_created) as Mes,MONTH(date_created) as Meses'))
        ->groupby('Año','Meses','Mes')->take(6)
        ->get();
        return $data_prod;
    }
    public static function productos_destacados(){
        $data_prod_desc = self::SELECT('productos.nombre as nombres', DB::raw('count(productos.id) as `cantidad`'),DB::raw('YEAR(compras_detalles.created_at) as Año, MONTHNAME(compras_detalles.created_at) as Mes,MONTH(compras_detalles.created_at) as Meses'))
        ->JOIN('compras_detalles','compras_detalles.id_producto','=','productos.id')
        ->groupby('Año','Meses','Mes',"nombres")->take(5)->get();
        return $data_prod_desc;
    }
}
