<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProcesoContractualsTable extends Migration
{

    public function up()
    {
        Schema::create('proceso_contractuals', function (Blueprint $table) {
            $table->increments('id');
            $table->string('tipo_proceso');
            $table->string('numero_cdp');
            $table->string('year_cdp');
            $table->longText('objeto');
            $table->string('dependencia');
            $table->double('numero_contrato')->nullable();
            $table->string('fecha_aprobacion');
            $table->string('nombre_supervisor');
            $table->string('id_supervisor');
            $table->string('email_supervisor');
            $table->string('estado');
            $table->integer('user_id');
            $table->integer('tipo_procesos_id')->unsigned();
            $table->foreign('tipo_procesos_id')->references('id')->on('tipo_procesos');
            $table->rememberToken();
            $table->timestamps();
            $table->unique(['numero_cdp','year_cdp']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('proceso_contractuals');
    }
}
