<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Session;

class Cart extends Model
{
    protected $fillable = [
        'estado',
        'id_usuario',
        'created_at',
    ];
    use HasFactory;
    public function order_details(){
        return $this->hasMany(order::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }

    public static function findOnCreateBySessionId($CartID){
        if($CartID){
            return Cart::find($CartID);
        }else{
            return Cart::create();
        }
    }
    public function quantity_of_products(){
        return $this->order_details->sum('cantidad');
    }
    public function total_price(){
        $total = 0;
        foreach ($this->order_details as $key => $order_detail) {
            $total += $order_detail->precio * $order_detail->cantidad;
        }
        return $total;
    }
    public static function get_session_cart(){
        $session_name = 'cart_id';
        $cart_id = Session::get($session_name);
        $cart = self::findOnCreateBySessionId($cart_id);
        return $cart;
    }
    public function my_store($product, $request){
        $this->order_details()->create([
            'cart_id'=>$request,
            'cantidad'=>$request->cantidad,
            'precio'=>$product->precio*$request->cantidad, 
            'id_producto'=>$product->id,
            // 'id_combo'=>$combo->id,
        ]);
    }

    public function store_a_product($product){
        $this->order_details()->create([
            'precio'=>$product->precio, 
            'id_producto'=>$product->id,
            // 'id_combo'=>$combo->id,
        ]);
    }
}
