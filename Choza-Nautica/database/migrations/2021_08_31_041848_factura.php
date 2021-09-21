<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Factura extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Factura', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->decimal('IGV',5,2);
            $table->decimal('Precio_total',5,2);
            $table->unsignedBigInteger('id_compra');
            $table->unsignedBigInteger('id_pago');            
            $table->unsignedBigInteger('id_reserva');
            $table->integer('RUC');
            $table->string('empres',160);
            $table->string('NroFactura',480);                        
            $table->timestamps();

            $table->foreign('id_compra')->references('id')->on('detalle_compras');
            $table->foreign('id_pago')->references('id')->on('metodo_pago');
            $table->foreign('id_reserva')->references('id')->on('Reserva');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Factura');
    }
}
