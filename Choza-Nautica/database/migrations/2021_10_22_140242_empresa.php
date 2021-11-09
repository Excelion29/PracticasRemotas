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
            $table->string('name');
            $table->string('name_formal');
            $table->text('descripcion');
            $table->text('direccion');
            $table->string('telefono');
            $table->string('horarios');
            $table->string('ruc');
            $table->string('correo');
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
