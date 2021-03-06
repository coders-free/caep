<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIdentificacionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('identificaciones', function (Blueprint $table) {
            $table->id();

            $table->string('identificacionable_id');
            $table->string('identificacionable_type');

            $table->string('direccion')->nullable();

            $table->unsignedBigInteger('region_id')->nullable();
            $table->foreign('region_id')->references('id')->on('regiones')->onDelete('cascade');

            $table->unsignedBigInteger('comuna_id')->nullable();
            $table->foreign('comuna_id')->references('id')->on('comunas')->onDelete('cascade');

            $table->dateTime('fecha_nacimiento')->nullable();

            $table->unsignedBigInteger('sexo_id')->nullable();
            $table->foreign('sexo_id')->references('id')->on('sexos')->onDelete('cascade');

            $table->unsignedBigInteger('estado_civil_id')->nullable();
            $table->foreign('estado_civil_id')->references('id')->on('estados_civiles')->onDelete('cascade');

            $table->boolean('separacion')->nullable();

            $table->string('celular')->nullable();

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
        Schema::dropIfExists('identificaciones');
    }
}
