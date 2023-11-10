<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSansHasObjetosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sans_has_objetos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('id_sans');
            $table->unsignedBigInteger('id_objetos');

            $table->foreign('id_sans')->references('id')->on('sans')->onDelete('cascade');
            $table->foreign('id_objetos')->references('id')->on('objetos')->onDelete('cascade');
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
        Schema::dropIfExists('sans_has_objetos');
    }
}
