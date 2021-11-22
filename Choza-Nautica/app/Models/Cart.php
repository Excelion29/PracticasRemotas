<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class Cart extends Model
{
    // protected $fillable = [
    //     'estado',
    //     'user_id',
    //     'created_at',
    // ];
    use HasFactory;
    public function order_details(){
        return $this->hasMany(order::class);
    }
    // public function user(){
    //     return $this->belongsTo(User::class,'user_id');
    // }
    public function validate_products(){
        if($this->order_details()->count()>0){
            return true;
        }else{
            return false;
        }
    }

    public static function findOnCreateBySessionId($CartID){
        if($CartID){
            return Cart::find($CartID);
        }else{
            return Cart::create();
        }
    }
    public static function findOnCreateByUserId($User){
        $estado = $User->carts->where('estado', '1')->firstOrFail();
        if($estado){
            return $User->carts->where('estado', '1')->firstOrFail();
        }else{
            return self::create([
                'user_id' => auth()->user()->id,
            ]);
        }
    }
    public function quantity_of_products(){
        return $this->order_details->sum('cantidad');
    }
    public function total_price(){
        $total = 0;
        foreach ($this->order_details as $key => $order_detail) {
            if($order_detail->product){
            $total += $order_detail->product->getDiscountAttribute() * $order_detail->cantidad;
            }
            elseif($order_detail->combo){
                $total += $order_detail->combo->precio * $order_detail->cantidad;
            }
        }
        return $total;
    }
    public static function get_session_cart(){
        $session_name = 'cart_id';
        $cart_id = Session::get($session_name);
        $cart = self::findOnCreateBySessionId($cart_id);
        return $cart;
    }
    // public static function get_user_session_cart(){
    //     $cart = self::findOnCreateByUserId(Auth::user());
    //     return $cart;
    // }
    public function my_store($product, $request){
        $this->order_details()->updateOrCreate(
            ['id_producto'=>$product->id],
            [
            'cantidad'=>DB::raw("cantidad +$request->cantidad"),
            'precio'=>DB::raw("precio+".$product->getDiscountAttribute()*$request->cantidad),
        ]);
    }
    public function store_a_product($product){
        $this->order_details()->updateOrCreate(
            ['id_producto'=>$product->id],
            [
            'precio'=>DB::raw("precio+".$product->getDiscountAttribute()), 
            'cantidad'=>DB::raw('cantidad+1'),
        ]);
    }
    
    public function my_store_combo($combo, $request){
        $this->order_details()->updateOrCreate(
            ['id_combo'=>$combo->id],
            [
            'cantidad'=>DB::raw("cantidad +$request->cantidad"),
            'precio'=>$combo->precio*$request->cantidad, 
            
            // 'id_combo'=>$combo->id,
        ]);
    }

    public function store_a_product_combo($combo){
        $this->order_details()->updateOrCreate(
            ['id_combo'=>$combo->id],
            [
            'precio'=>$combo->precio, 
            'cantidad'=>DB::raw('cantidad+1'),
        ]);
    }

    public function my_update($request){
        foreach ($this->order_details as $key=> $detail) {
            $result[] = array("cantidad" => $request->cantidad[$key],"precio"=>$request->precio[$key]*$request->cantidad[$key]);
            $detail->update($result[$key]);
        }
    }
    public function gen_uid($l=10){
        return substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyz"), 0, $l);
    }
}