<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInsumosHasCantidadesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('insumos_has_cantidades', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->integer('stock_min')->default(0);
            $table->integer('stock_max')->default(0);
            $table->integer('deposito')->default(0);
            $table->integer('local')->default(0);
            $table->unsignedBigInteger('id_local');
            $table->unsignedBigInteger('id_insumo');
            
            $table->foreign('id_local')->references('id')->on('local')->onDelete('cascade');
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
        Schema::dropIfExists('insumos_has_cantidades');
    }
}
