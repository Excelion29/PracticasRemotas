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
            'paymentmethod'=>['required']
        ]);   
        $paymentPlatform = $this->paymentPlatformResolver
        ->resolveService($request->paymentmethod);
        session()->put('paymentPlatformId', $request->paymentmethod);
        return $paymentPlatform->handlePayment($request);     
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
