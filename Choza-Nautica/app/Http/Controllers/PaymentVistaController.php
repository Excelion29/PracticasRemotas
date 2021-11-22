<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Compra;
use Illuminate\Http\Request;
use App\Resolvers\PaymentPlatformResolver;

class PaymentVistaController extends Controller
{ 
    protected $paymentPlatformResolver;

    public function __construct(PaymentPlatformResolver $paymentPlatformResolver)
    {
        $this->middleware('client_auth');   
        $this->paymentPlatformResolver = $paymentPlatformResolver;
    }
    public function pays(Request $request){
        $request->validate([
            'paymentmethod'=>'required|exists:payment_platforms,id', 
            'email'=>'nullable|email:rfc,dns',   
        ]);  
        if ($request->paymentmethod!=1) {
            $paymentPlatform = $this->paymentPlatformResolver
            ->resolveService($request->paymentmethod);
            session()->put('paymentPlatformId', $request->paymentmethod);
    
            $cart = Cart::get_session_cart();
            $total_price = $cart->total_price();
            $request->merge([
                'value' => $total_price,
            ]);
            return $paymentPlatform->handlePayment($request);   
        }
        else{
            Compra::my_store_contraentrega();
            $orders = auth()->user()->compras;
            return view('MyAccount.orders',compact('orders'));
        }
          
    }
    public function approval(){
        if (session()->has('paymentPlatformId')) {
            $paymentPlatform = $this->paymentPlatformResolver
            ->resolveService(session()->get('paymentPlatformId'));
            return $paymentPlatform->handleApproval();    
        }
        return redirect()
            ->route('home')
            ->withErrors('We cannot retrieve your payment platform. Try again, please');
    }
    public function cancelled(){
        return redirect()
        ->route('shop.index')
        ->withErrors('You cancelled the payment');
    }
}
