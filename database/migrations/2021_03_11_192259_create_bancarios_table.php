<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBancariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bancarios', function (Blueprint $table) {
            $table->id();

            $table->string('bancarioable_id');
            $table->string('bancarioable_type');

            $table->unsignedBigInteger('envio_id')->nullable();
            $table->foreign('envio_id')->references('id')->on('envios');

            $table->string('agencia')->nullable()->default('');

            $table->unsignedBigInteger('tipo_id')->nullable();
            $table->foreign('tipo_id')->references('id')->on('tipos');

            $table->string('banco')->nullable()->default('');
            $table->string('numero_cuenta')->nullable();

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
        Schema::dropIfExists('bancarios');
    }
}
