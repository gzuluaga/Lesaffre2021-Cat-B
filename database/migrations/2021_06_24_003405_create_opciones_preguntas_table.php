<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOpcionesPreguntasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::disableForeignKeyConstraints();

        Schema::create('opciones_preguntas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_pregunta')->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->longText('nombrePregunta');
            $table->boolean('criterio')->default(false);
            $table->boolean('estado')->default(true);
            $table->timestamps();
        });

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('opciones_preguntas');
    }
}
