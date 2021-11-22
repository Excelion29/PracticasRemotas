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
            'name'=>'Contraentrega',
            'img'=>'img/pago-contraentrega.png',
        ]);
        payment_platforms::create([
            'name'=>'Paypal',
            'img'=>'img/paypal2.png',
        ]);
        payment_platforms::create([
            'name'=>'mercadopago',
            'img'=>'img/mercadopago.png',
        ]);
    }
}
