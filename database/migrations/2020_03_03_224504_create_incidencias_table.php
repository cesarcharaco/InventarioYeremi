<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIncidenciasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('incidencias', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('id_insumo');
            $table->integer('cantidad');
            $table->enum('tipo',['Dañado de Fábrica','Dañado en Local','Dañado y Devuelto','Perdido','Vencido']);
            $table->text('observacion')->nullable();
            $table->date('fecha_incidencia');
            $table->enum('descontar',['Local','Depósito'])->default('Local');

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
        Schema::dropIfExists('incidencias');
    }
}
