<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Order extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
    Schema::create('orders', function (Blueprint $table) {
            $table->id('id');              
            $table->unsignedBigInteger('cart_id');   
            $table->unsignedBigInteger('id_producto')->nullable();             
            $table->unsignedBigInteger('id_combo')->nullable();         
            $table->integer('cantidad');
            $table->decimal('precio');
            $table->timestamps();

            $table->foreign('id_combo')->references('id')->on('Combos');
            $table->foreign('id_producto')->references('id')->on('productos');
            $table->foreign('cart_id')->references('id')->on('Carts');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
