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
            $table->unsignedBigInteger('user_id');   
            $table->foreign('user_id')->references('id')->on('Users')->onDelete('cascade')->onUpdate('cascade');
            $table->enum('estado',['VÁLIDO','PENDIENTE','ENTREGADO','CANCELADO'])->default('PENDIENTE');
            $table->enum('estado_pago',['PENDIENTE','PAGADO','REEMBOLSADO'])->default('PAGADO');   
            $table->string('codigo');
            $table->decimal('subtotal');
            $table->decimal('impuesto');
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
