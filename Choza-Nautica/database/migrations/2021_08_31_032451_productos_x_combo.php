<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ProductosXCombo extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Productos_x_combo', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('id_producto');
            $table->unsignedBigInteger('id_combo');            
            $table->timestamps();

            $table->foreign('id_producto')->references('ID_Producto')->on('productos');
            $table->foreign('id_combo')->references('ID_Combo')->on('Combos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Productos_x_combo');
    }
}
