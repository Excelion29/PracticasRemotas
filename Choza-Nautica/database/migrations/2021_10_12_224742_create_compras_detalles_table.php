<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateComprasDetallesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('compras_detalles', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('compras_id');   
            $table->foreign('compras_id')->references('id')->on('compras');
            $table->unsignedBigInteger('id_producto')->nullable();             
            $table->unsignedBigInteger('id_combo')->nullable();         
            $table->integer('cantidad')->default(1);
            $table->decimal('precio',5,2);  
            
            $table->foreign('id_combo')->references('id')->on('Combos');
            $table->foreign('id_producto')->references('id')->on('productos');
            
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
        Schema::dropIfExists('compras_detalles');
    }
}
