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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('username');
            $table->string('payeer')->unique();
            $table->string('email');
            $table->integer('referido_id')->nullable();
            $table->string('imagen')->nullable();
            $table->string('password');
            $table->string('rol');
            $table->double('total_billetera')->default(0); // saldo que tiene disponible en la cuenta
            $table->integer('pool_activa')->default(1); // maneja la pool que va a estar activa
            $table->dateTime('fecha_creacion')->useCurrent = true;
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
        Schema::dropIfExists('users');
    }
}
