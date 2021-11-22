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
        Schema::create('combos_productos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('productos_id')->nullable();
            $table->unsignedBigInteger('combos_id');
             
            
            $table->foreign('productos_id')->references('id')->on('productos')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('combos_id')->references('id')->on('Combos')->onDelete('cascade')->onUpdate('cascade');
         
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
        Schema::dropIfExists('combos_productos');
    }
}
