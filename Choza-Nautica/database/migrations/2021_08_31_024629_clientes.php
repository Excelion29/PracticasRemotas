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
            $table->string('dni')->nullable()->unique();
            $table->string('ruc')->nullable()->unique();            
            $table->string('direccion')->nullable()->unique();
            $table->string('celular')->nullable()->unique();
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
