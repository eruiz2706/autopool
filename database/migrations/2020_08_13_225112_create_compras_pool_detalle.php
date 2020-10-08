<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateComprasPoolDetalle extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('compras_pool_detalle', function (Blueprint $table) {
            $table->id();
            $table->integer('compra_id');
            $table->integer('user_id');
            $table->double('valor');
            $table->string('descripcion');
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
        Schema::dropIfExists('compras_pool_detalle');
    }
}
