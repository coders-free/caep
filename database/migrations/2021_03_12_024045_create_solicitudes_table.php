<?php

use App\Models\Solicitud;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSolicitudesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('solicitudes', function (Blueprint $table) {
            $table->id();

            $table->string('imponente_rut');
            $table->foreign('imponente_rut')->references('rut')->on('imponentes')->onDelete('cascade');

            $table->integer('monto')->nullable();

            $table->unsignedBigInteger('prestamo_id')->nullable();
            $table->foreign('prestamo_id')->references('id')->on('prestamos')->onDelete('cascade');

            $table->enum('status', [Solicitud::BORRADOR, Solicitud::REVISION, Solicitud::APROBADO, Solicitud::RECHAZADO])->default(Solicitud::BORRADOR);


            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

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
        Schema::dropIfExists('solicitudes');
    }
}
