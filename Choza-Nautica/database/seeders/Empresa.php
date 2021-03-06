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
            'name_formal'=>'LA CHOZA NAUTICA S.C.R.L ',
            'descripcion'=>'El Restaurant LA CHOZA NAUTICA es una empresa que forma parte de la gastronom a peruana por mas de 20 a os, desde la popular Casita de la Abuelita; en los a os 1993, donde su hijo el propietario Jos Guillian, transforma su negocio de televisores en un pintoresco restaurante.',
            'direccion'=>'Jr. Brigadier Pumacahua 2374, Cercado de Lima 15073',
            'telefono'=>'(51) 936 663 475',
            'horarios'=>'6:00 am - 7:00 pm',
            'ruc'=>'20256802351',
            'correo'=>'chozanautica.ica@gmail.com',
            'latitud'=>'-12.085424599629652',
            'longitud'=>'-77.04320687802092',
            'google_maps_link'=>'https://bookersnap.com/LaChozaNautica',
        ]);
    }
}
