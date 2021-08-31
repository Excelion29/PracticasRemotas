<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Boleta extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Boleta', function (Blueprint $table) {
            $table->bigIncrements('id_Boleta');
            $table->decimal('Precio_total',5,2);
            $table->unsignedBigInteger('id_compra');
            $table->unsignedBigInteger('id_pago');            
            $table->unsignedBigInteger('id_reserva');                        
            $table->timestamps();

            $table->foreign('id_compra')->references('ID_Compra')->on('detalle_compra');
            $table->foreign('id_pago')->references('ID_Pago')->on('metodo_pago');
            $table->foreign('id_reserva')->references('ID_Reserva')->on('Reserva');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Boleta');
    }
}
