<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Categorias extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categorias', function (Blueprint $table) {
            $table->id('id');
            $table->unsignedBigInteger('id_administrador');
            $table->string('nombre');
            $table->text('descripcion'); 
            $table->string('foto');   
            $table->boolean('estado')->default(1);        
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
        Schema::dropIfExists('categorias');
    }
}
