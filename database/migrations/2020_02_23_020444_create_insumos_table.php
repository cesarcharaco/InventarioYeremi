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
            $table->integer('stock_min')->default(0);
            $table->integer('stock_max')->default(0);
            $table->integer('deposito')->default(0);
            $table->integer('local')->default(0);
            $table->unsignedBigInteger('id_local');
            
            $table->foreign('id_local')->references('id')->on('local')->onDelete('cascade');
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
