<?php

namespace App\Services;

use App\Models\Cart;
use App\Models\Compra;
use App\Models\order;
use Illuminate\Http\Request;
use App\Traits\ConsumesExternalServices;

class ContraentregaService
{
    public function handlePayment(Request $request)
    {
        Compra::my_store();
    }
}