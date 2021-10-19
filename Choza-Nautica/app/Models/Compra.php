<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Compra extends Model
{
    protected $fillable = [
        'estado',
        'estado_pago',
        'created_at',
        'user_id',
        'subtotal',
        'impuesto',
    ];
    public function compras_detalles(){
        return $this->hasMany(compras_detalles::class);
    }
    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }
    public function subtotal() {
         $total = 0;
         foreach ($this->compras_detalles as $key => $compras_detalle) {
             $total += $compras_detalle->total();
         }
         return $total;
    }

    public function total(){
        return $this->subtotal() * $this->impuesto;
    }
    public function  my_store(){
        $cart = Cart::get_user_session_cart();
        $compra = self::create([
            'estado'=>'PENDIENTE',
            'estado_pago'=>'PAGADO',
            'created_at' => Carbon::now(),
            'user_id'=>auth()->user()->id,
            'subtotal'=>$cart->total_price(),
            'impuesto'=>0.18,
        ]);
        foreach ($cart->order_details as $key => $order_detail) {
            if($order_detail->id_producto!=''){
                $results[] = array("id_producto"=>$order_detail->id_producto[$key],"cantidad"=>$order_detail->cantidad[$key],"precio"=>$order_detail->precio[$key]);
            }
            elseif($order_detail->id_combo!=''){
                $results[] = array("id_combo"=>$order_detail->id_combo[$key],"cantidad"=>$order_detail->cantidad[$key],"precio"=>$order_detail->precio[$key]);
            }
        }
        $compra->compras_detalles()->createMany($results);
    }
}
