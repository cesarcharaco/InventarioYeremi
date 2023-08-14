<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePrestamosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prestamos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('id_solicitante');
            $table->unsignedBigInteger('id_insumo');
            $table->enum('tipo',['Prestar','Entregar'])->default('Prestar');
            $table->text('observacion')->nullable();
            $table->date('fecha_prestamo');
            $table->date('fecha_devuelto')->nullable();
            $table->enum('status',['Sin Devolver','Devuelto','No Aplica'])->default('Sin Devolver');
            $table->integer('cantidad');

            $table->foreign('id_solicitante')->references('id')->on('solicitantes')->onDelete('cascade');
            $table->foreign('id_insumo')->references('id')->on('insumos')->onDelete('cascade');
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
        Schema::dropIfExists('prestamos');
    }
}
