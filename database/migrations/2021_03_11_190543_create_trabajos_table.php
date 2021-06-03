<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTrabajosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trabajos', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('trabajoable_id');
            $table->string('trabajoable_type');

            $table->string('reparticion')->nullable();

            $table->string('cargo')->nullable();

            /* $table->unsignedBigInteger('cargo_id')->nullable();
            $table->foreign('cargo_id')->references('id')->on('cargos'); */

            $table->dateTime('antiguedad')->nullable();

            $table->string('direccion')->nullable();

            $table->unsignedBigInteger('region_id')->nullable();
            $table->foreign('region_id')->references('id')->on('regiones');

            $table->unsignedBigInteger('comuna_id')->nullable();
            $table->foreign('comuna_id')->references('id')->on('comunas');

            $table->boolean('complete')->default(0);

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
        Schema::dropIfExists('trabajos');
    }
}
