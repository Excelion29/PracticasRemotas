<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use League\CommonMark\Reference\Reference;

class Clientes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Clientes', function (Blueprint $table) {
            $table->id('id');
            $table->string('dni')->nullable();
            $table->string('ruc')->nullable();            
            $table->string('direccion')->nullable();
            $table->string('celular')->nullable();
            $table->unsignedBigInteger('id_usuario');      
            $table->timestamps();

            $table->foreign('id_usuario')->references('id')->on('Users')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Clientes');
    }
}
