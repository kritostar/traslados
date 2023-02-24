<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class FormularioTraslado extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tramites', function (Blueprint $table) {
            $table->boolean('certificado_discapacidad');
            $table->boolean('resol_154_85');
            $table->integer('situacion_traslado');
            $table->string('origen_institucion');
            $table->string('origen_direccion');
            $table->string('destino_institucion');
            $table->string('destino_direccion');
            $table->integer('tipo_traslado');
            $table->integer('tipo_unidad_traslado');
            $table->integer('tipo_asistencia');
            $table->string('frecuencia_semanal');
            $table->string('duracion_tratamiento');
            $table->boolean('coseguro');
            $table->boolean('requiere_espera');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tramites', function (Blueprint $table) {
            //
        });
    }
}
