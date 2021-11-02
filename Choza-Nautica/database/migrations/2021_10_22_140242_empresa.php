<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Empresa extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('empresa_detalles', function (Blueprint $table) {
            $table->id();         
            $table->string('name')->default('La Choza Nautica');
            $table->text('descripcion')->default('Jr. Brigadier Pumacahua 2374, Cercado de Lima 15073');
            $table->string('telefono')->default('(01) 5212153');
            $table->string('horarios')->default('6:00 am - 7:00 pm');
            $table->string('correo')->default('chozanautica.ica@gmail.com');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('empresa_detalles');
    }
}
