<?php

namespace App\Http\Controllers;

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
            'payment_platform'=>['required']
        ]);   
        $paymentPlatform = $this->paymentPlatformResolver
        ->resolveService($request->payment_platform);
        session()->put('paymentPlatformId', $request->payment_platform);
        return $paymentPlatform->handlePayment($request);     
    }
}
