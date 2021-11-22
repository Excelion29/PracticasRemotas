<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductPromocionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productos_promociones', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('productos_id')->nullable();
            $table->foreign('productos_id')->references('id')->on('productos')->onDelete('cascade')->onUpdate('cascade');

            $table->unsignedBigInteger('promociones_id'); 
            $table->foreign('promociones_id')->references('id')->on('promociones')->onDelete('cascade')->onUpdate('cascade');
            
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
        Schema::dropIfExists('productos_promociones');
    }
}
