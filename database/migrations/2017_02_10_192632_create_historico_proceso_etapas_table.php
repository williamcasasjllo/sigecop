<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHistoricoProcesoEtapasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('historico_proceso_etapas', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('proceso_etapa_id')->unsigned();
            $table->foreign('proceso_etapa_id')->references('id')->on('proceso_etapas');
            $table->integer('proceso_contractual_id');
            $table->integer('etapas_id');
            $table->integer('user_id');
            $table->string('estado');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('historico_proceso_etapas');
    }
}
