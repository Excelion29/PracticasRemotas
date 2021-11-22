<?php

namespace App\Services;

use App\Models\Cart;
use App\Models\Compra;
use Illuminate\Http\Request;
use App\Traits\ConsumesExternalServices;
use App\Services\CurrencyConversionService;

class ContraentregaService
{
    use ConsumesExternalServices;
    public function handlePayment(Request $request)
    {
        Compra::my_store();
    }

}