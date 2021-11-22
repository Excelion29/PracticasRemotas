<?php

namespace Database\Seeders;

use App\Models\Roles;
use App\Models\User;
use Carbon\Carbon;
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

        User::create([
            'id_rol' => 1,
            'name' =>'Admin',
            'apellidos' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => '$2y$10$7eJ5HuHIRo600WKXRSdkHO/sAyMchNC48hw5eQ3fxGwYStWNhHMUC',
            'created_at' => Carbon::now(),
        ])->cliente()->create();
        User::create([
            'id_rol' => 2,
            'name' =>'Cliente',
            'apellidos' => 'Cliente',
            'email' => 'cliente@gmail.com',
            'password' => '$2y$10$7eJ5HuHIRo600WKXRSdkHO/sAyMchNC48hw5eQ3fxGwYStWNhHMUC',
            'created_at' => Carbon::now(),
        ])->cliente()->create();
        User::create([
            'id_rol' => 3,
            'name' =>'Empleado',
            'apellidos' => 'Empleado',
            'email' => 'empleado@gmail.com',
            'password' => '$2y$10$7eJ5HuHIRo600WKXRSdkHO/sAyMchNC48hw5eQ3fxGwYStWNhHMUC',
            'created_at' => Carbon::now(),
        ])->cliente()->create();
    }
}
