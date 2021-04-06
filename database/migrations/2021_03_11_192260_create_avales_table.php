<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAvalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('avales', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('avalable_id');
            $table->string('avalable_type');
            
            $table->string('name')->nullable();
            $table->unsignedBigInteger('rut')->nullable();

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
        Schema::dropIfExists('avales');
    }
}
