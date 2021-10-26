<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(PaymentsSeeder::class);
        $this->call(MonedaSeeder::class);
        $this->call(RolesSeeder::class);
        $this->call(Empresa::class);
    }
}
