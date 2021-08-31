<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Pedidos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pedidos', function (Blueprint $table) {
            $table->id('ID_Pedido');
            $table->unsignedBigInteger('id_producto');
            $table->unsignedBigInteger('id_combo');
            $table->integer('cantidad');
            $table->decimal('precio',5,2);            
            $table->timestamps();

            $table->foreign('id_producto')->references('ID_Producto')->on('productos');
            $table->foreign('id_combo')->references('id_combo')->on('Combos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pedidos');
    }
}
