<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCreditosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('creditos', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('imponente_id');
            $table->foreign('imponente_id')->references('id')->on('imponentes');

            $table->unsignedBigInteger('prestamo_id');
            $table->foreign('prestamo_id')->references('id')->on('prestamos');

            $table->dateTime('fecha_cierre');

            $table->float('monto_prestamo');

            $table->integer('numero_cuotas');

            $table->float('monto_cuota');

            $table->dateTime('fecha_vencimiento');

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
        Schema::dropIfExists('creditos');
    }
}