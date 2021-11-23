<?php

namespace App\Models;

use App\Events\CompraEvent;
use App\Notifications\ComprasNotification;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use willvincent\Rateable\Rateable;

use function Composer\Autoload\includeFile;

class Compra extends Model
{
    use Rateable;
    protected $fillable = [
        'id',
        'estado',
        'estado_pago',
        'direccion',
        'created_at',
        'user_id',
        'codigo',
        'subtotal',
        'impuesto',
    ];
    public function compras_detalles(){
        return $this->hasMany(compras_detalles::class,'compras_id');
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
    public function total_impuesto(){
        return $this->subtotal() + $this->impuesto;
    }
    public function total(){
        return $this->total_impuesto();
    }


    public static function  my_store(){
        $cart = Cart::get_session_cart();
        $compra = self::create([
            'estado'=>'PENDIENTE',                
            'direccion'=>'',
            'estado_pago'=>'PAGADO',
            'created_at' => Carbon::now(),
            'user_id'=>auth()->user()->id,
            'codigo'=> $cart->gen_uid(),
            'subtotal'=>$cart->total_price(),
            'impuesto'=>5,
        ]);
        foreach ($cart->order_details as $key => $abc) {
            if($cart->order_details[$key]->id_producto!=''){
                $results[] = array(
                    "cantidad"=>$cart->order_details[$key]->cantidad,
                    "precio"=>$cart->order_details[$key]->precio,
                    "id_producto"=>$cart->order_details[$key]->id_producto);
            }
            elseif($cart->order_details[$key]->id_combo!=''){
                $results[] = array(
                    "cantidad"=>$cart->order_details[$key]->cantidad,
                    "precio"=>$cart->order_details[$key]->precio,                
                    "id_combo"=>$cart->order_details[$key]->id_combo);
            }
        }
        $compra->compras_detalles()->createMany($results);
        self::make_compra_notification($compra);
    }
    
    public static function  my_store_contraentrega(){
        $cart = Cart::get_session_cart();
        $compra = self::create([
            'estado'=>'PENDIENTE',                
            'direccion'=>'',
            'estado_pago'=>'PENDIENTE',
            'created_at' => Carbon::now(),
            'user_id'=>auth()->user()->id,
            'codigo'=> $cart->gen_uid(),
            'subtotal'=>$cart->total_price(),
            'impuesto'=>5,
        ]);
        foreach ($cart->order_details as $key => $abc) {
            if($cart->order_details[$key]->id_producto!=''){
                $results[] = array(
                    "cantidad"=>$cart->order_details[$key]->cantidad,
                    "precio"=>$cart->order_details[$key]->precio,
                    "id_producto"=>$cart->order_details[$key]->id_producto);
            }
            elseif($cart->order_details[$key]->id_combo!=''){
                $results[] = array(
                    "cantidad"=>$cart->order_details[$key]->cantidad,
                    "precio"=>$cart->order_details[$key]->precio,                
                    "id_combo"=>$cart->order_details[$key]->id_combo);
            }
        }
        $compra->compras_detalles()->createMany($results);
        self::make_compra_notification($compra);
    }
    static function make_compra_notification($compra){
        event(new CompraEvent($compra));
        // User::join('roles','roles.id','=','users.id_rol')
        // ->whereIn('users.id_rol',[1,3])
        // ->each(function(User $user) use ($compra){
        //     $user->notify(new ComprasNotification($compra));
        // });
    }

    public static function compras_mes(){
        $data = self::SELECT(DB::raw('count(id) as `cantidad`'),DB::raw('YEAR(created_at) as Año, MONTHNAME(created_at) as Mes,MONTH(created_at) as Meses'))
           ->groupby('Año','Meses','Mes')->orderByDesc('Meses')
           ->get();
        return $data;
    }
}

