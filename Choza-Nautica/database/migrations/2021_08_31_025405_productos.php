<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Productos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productos', function (Blueprint $table) {
            $table->ID('ID_Producto');
            $table->unsignedBigInteger('id_categoria');
            $table->string('nombre',50);
            $table->decimal('precio',5,2);
            $table->boolean('estado')->default(1);
            $table->unsignedBigInteger('id_administrador');     
            $table->timestamps();
            $table->foreign('id_categoria')->references('ID_Categoria')->on('categorias');
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
        Schema::dropIfExists('productos');
    }
}
