<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Reserva extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Reserva', function (Blueprint $table) {
            $table->ID('id');
            $table->unsignedBigInteger('id_usuario');           
            $table->unsignedBigInteger('id_mesa');
            $table->integer('NPersonas');
            $table->date('fecha');
            $table->time('hora');
            $table->timestamps();

            $table->foreign('id_usuario')->references('id')->on('Clientes');
            $table->foreign('id_mesa')->references('id')->on('mesa');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Reserva');
    }
}
