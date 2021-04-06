<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateComunasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comunas', function (Blueprint $table) {
            $table->id();

            $table->string('name');
            
            $table->unsignedBigInteger('region_id');
            $table->foreign('region_id')->references('id')->on('regiones');

            $table->unsignedBigInteger('agencia_id');
            $table->foreign('agencia_id')->references('id')->on('agencias');

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
        Schema::dropIfExists('comunas');
    }
}
