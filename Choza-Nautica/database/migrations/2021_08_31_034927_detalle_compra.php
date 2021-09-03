<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DetalleCompra extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detalle_compra', function (Blueprint $table) {
            $table->id('id');
            $table->unsignedBigInteger('id_usuario');   
            $table->unsignedBigInteger('id_pedido');
            $table->unsignedBigInteger('id_lugar');
            $table->unsignedBigInteger('id_tipo');
            $table->mediumText('Ubicación');
            $table->timestamps();

            $table->foreign('id_usuario')->references('id')->on('Clientes');
            $table->foreign('id_pedido')->references('id')->on('pedidos');
            $table->foreign('id_lugar')->references('id')->on('Costo_x_delivery');
            $table->foreign('id_tipo')->references('id')->on('tipo_compra');


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detalle_compra');
    }
}
