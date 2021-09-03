<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Combos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Combos', function (Blueprint $table) {
            $table->id('id');
            $table->unsignedBigInteger('id_administrador');
            $table->string('nombre',150);
            $table->longText('descripcion');
            $table->decimal('precio',5,2); 
            $table->string('foto');           
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
        Schema::dropIfExists('Combos');
    }
}
