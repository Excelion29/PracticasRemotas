<?php

namespace Database\Seeders;

use App\Models\moneda;
use Illuminate\Database\Seeder;

class MonedaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $monedas =[
            'usd',
            'pe',
        ];
        foreach ($monedas as $key => $moneda) {
            moneda::created([
                'iso' => $moneda
            ]);
        }
    }
}
