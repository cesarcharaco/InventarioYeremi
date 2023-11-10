<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSansHasParticipantesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sans_has_participantes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedbigInteger('id_san');
            $table->unsignedbigInteger('id_participante');
            $table->integer('posicion');
            $table->date('fecha_entrega');
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
        Schema::dropIfExists('sans_has_participantes');
    }
}
