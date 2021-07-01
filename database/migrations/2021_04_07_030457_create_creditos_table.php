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

            $table->string('imponente_rut');
            $table->foreign('imponente_rut')
                ->references('rut')
                ->on('imponentes')
                ->onDelete('cascade');

            $table->unsignedBigInteger('prestamo_id');
            $table->foreign('prestamo_id')->references('id')->on('prestamos')->onDelete('cascade');

            $table->dateTime('fecha_cierre');

            $table->bigInteger('monto_prestamo');

            $table->integer('numero_cuotas');

            $table->bigInteger('monto_cuota');

            $table->string('fecha_vencimiento');

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
