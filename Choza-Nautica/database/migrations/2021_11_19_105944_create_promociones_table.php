<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePromocionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('promociones', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->decimal('descuento')->nullable();
            $table->float('descuento_fijo')->nullable();  
            $table->string('tipo');  
            $table->dateTime('fecha_inicio');
            $table->dateTime('fecha_final');
            $table->unsignedBigInteger('id_administrador'); 
            $table->timestamp('date_created');  
            $table->timestamps();
            $table->foreign('id_administrador')->references('id')->on('Users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('promociones');
    }
}
