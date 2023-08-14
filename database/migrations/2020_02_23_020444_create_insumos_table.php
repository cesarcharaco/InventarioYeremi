<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInsumosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('insumos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('producto');
            $table->text('descripcion');
            $table->string('serial');
            $table->string('modelo')->nullable();
            $table->string('marca')->nullable();
            $table->unsignedBigInteger('id_gerencia');
            $table->string('ubicacion');
            $table->integer('existencia')->default(0);
            $table->integer('in_almacen')->default(0);
            $table->integer('out_almacen')->default(0);
            $table->integer('disponibles')->default(0);
            $table->integer('entregados')->nullable();
            $table->integer('usados')->nullable();
            $table->integer('inservible')->nullable();

            $table->foreign('id_gerencia')->references('id')->on('gerencias')->onDelete('cascade');
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
        Schema::dropIfExists('insumos');
    }
}
