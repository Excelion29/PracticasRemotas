<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Users', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_rol')->default(2);
            $table->string('name',70);
            $table->string('apellidos',150);
            $table->string('email',150)->nullable()->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password',70);
            $table->boolean('estado')->default(1);
            $table->rememberToken();
            $table->timestamps();
            
            $table->foreign('id_rol')->references('id')->on('roles');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Users');
    }
}
