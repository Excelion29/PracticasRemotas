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
        Schema::create('detalle_compras', function (Blueprint $table) {
            $table->id('id');   
            $table->unsignedBigInteger('order_id');
            $table->unsignedBigInteger('id_lugar');
            $table->unsignedBigInteger('id_tipo');  
            $table->decimal('precio',5,2);          
            $table->mediumText('Ubicación');
            $table->timestamps();
            $table->foreign('order_id')->references('id')->on('orders');
            $table->foreign('id_lugar')->references('id')->on('Costo_x_delivery');
            $table->foreign('id_tipo')->references('id')->on('tipo_compras');


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detalle_compras');
    }
}
