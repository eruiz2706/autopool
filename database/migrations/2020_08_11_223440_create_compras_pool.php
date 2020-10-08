<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateComprasPool extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('compras_pool', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->integer('pool_id');
            $table->integer('ciclo_pool');
            $table->integer('secuencia_pool');
            $table->double('valor');
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
        Schema::dropIfExists('compras_pool');
    }
}
