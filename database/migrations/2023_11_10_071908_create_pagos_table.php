<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePagosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pagos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedbigInteger('id_cuota');
            $table->unsignedbigInteger('id_participante');
            $table->enum('status',['Pagada','Sin Pagar'])->default('Sin Pagar');
            $table->enum('forma_pago',['Efectivo','Digital','N/A'])->default('N/A');
            $table->date('fecha')->nullable();
            $table->string('codigo')->nullable();
            $table->text('observacion')->nullable();

            $table->foreign('id_cuota')->references('id')->on('cuotas')->onDelete('cascade');
            $table->foreign('id_participante')->references('id')->on('participantes')->onDelete('cascade');
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
        Schema::dropIfExists('pagos');
    }
}
