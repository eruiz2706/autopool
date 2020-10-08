<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePoolsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pools', function (Blueprint $table) {
            $table->id();
            $table->double('valor');
            $table->integer('ciclos')->default(5);
            $table->string('color');
            $table->integer('cantidad_pool'); // cantidad de usuarios que deben pagar por pool
            $table->integer('id_pool'); //id actual al que llega los pagos del pool, incrementa cada que se completa los cantidad_pool
            $table->integer('secuencia_pool'); //secuencia en la que van las compras del pool
            $table->integer('secuencia_retiro'); //secuencia en la que se hace retiro de la pool
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
        Schema::dropIfExists('pools');
    }
}
