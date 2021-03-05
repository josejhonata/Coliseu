<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFichaTreinosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ficha_treinos', function (Blueprint $table) {
            $table->id();
            $table->string("titulo");
            $table->string("data_inicio");
            $table->string("data_final");
            $table->string("user_name");
            $table->string("situacao");
            $table->string("tipo_de_treino");
            $table->string("user_professor");
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
        Schema::dropIfExists('ficha_treinos');
    }
}
