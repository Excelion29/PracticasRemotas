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
        moneda::create([
            'iso'=>'usd',
        ]);
        moneda::create([
            'iso'=>'pen',
        ]);
    }
}
