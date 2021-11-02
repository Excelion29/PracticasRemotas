<?php

namespace Database\Seeders;

use App\Models\Roles;
use Illuminate\Database\Seeder;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Roles::create([
            'nombre'=>'Administrador',
        ]);
        Roles::create([
            'nombre'=>'Cliente',
        ]);
        Roles::create([
            'nombre'=>'Empleado',
        ]);
    }
}
