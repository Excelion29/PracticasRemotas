<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCostoXDeliverysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Costo_x_deliverys', function (Blueprint $table) {
            $table->id('id');
            $table->unsignedBigInteger('id_administrador');
            $table->mediumText('Distrito');
            $table->decimal('precio',5,2);  
            $table->boolean('estado')->default(1); 
            $table->timestamp('date_created');         
            $table->timestamps();
            $table->foreign('id_administrador')->references('id')->on('Users');
        });
    }
    public function down()
    {
        Schema::dropIfExists('Costo_x_deliverys');
    }
}
