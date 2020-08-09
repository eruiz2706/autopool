<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTicketDetalleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ticket_detalles', function (Blueprint $table) {
            $table->id();
            $table->integer('ticket_id')->unsigned()->index();
            $table->integer('user_id')->index();
            $table->text('descripcion');
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
        Schema::dropIfExists('ticket_detalle');
    }
}
