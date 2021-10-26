<?php

namespace Database\Seeders;

use App\Models\empresa_detalles;
use Illuminate\Database\Seeder;

class Empresa extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        empresa_detalles::create([
            'name'=>'La Choza Nautica',
            'descripcion'=>'Jr. Brigadier Pumacahua 2374, Cercado de Lima 15073',
            'telefono'=>'(01) 5212153',
            'horarios'=>'6:00 am - 7:00 pm',
            'correo'=>'chozanautica.ica@gmail.com',
        ]);
    }
}
