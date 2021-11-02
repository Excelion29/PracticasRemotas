<?php

namespace Database\Seeders;

use App\Models\payment_platforms;
use Illuminate\Database\Seeder;

class PaymentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        payment_platforms::create([
            'name'=>'Pagar al momento de la entrega',
        ]);
        payment_platforms::create([
            'name'=>'Paypal',
        ]);
        payment_platforms::create([
            'name'=>'MercadoPago',
        ]);
    }
}
