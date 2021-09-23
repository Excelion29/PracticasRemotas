<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateComprasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('compras', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_usuario');   
            $table->foreign('id_usuario')->references('id')->on('Users')->onDelete('cascade')->onUpdate('cascade');
            $table->decimal('tax');
            $table->decimal('total');
            $table->enum('estado',['Valido','Candelado'])->default('Valido');
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
        Schema::dropIfExists('compras');
    }
}
