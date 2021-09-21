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
<<<<<<< HEAD
            $table->string('foto');   
            $table->boolean('estado')->default(1);        
=======
            $table->string('foto');     
            $table->boolean('estado')->default(1);      
>>>>>>> d2a30b6c6460bfe4aa5a83f2631a42cd9a492126
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
