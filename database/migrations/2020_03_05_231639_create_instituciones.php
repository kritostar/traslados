<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInstituciones extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('instituciones', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->string('codigo');
            $table->string('nombre');
            $table->string('domicilio');
            $table->string('codigo_tipologia')->nullable();
            $table->string('tipologia')->nullable();
            $table->string('codigo_categoria_tipologia')->nullable();
            $table->string('categoria_tipologia')->nullable();
            $table->string('codigo_dependencia')->nullable();
            $table->string('dependencia')->nullable();
            $table->string('origen_financiamiento')->nullable();
            $table->string('codigo_provincia')->nullable();
            $table->string('provincia')->nullable();
            $table->string('codigo_departamento')->nullable();
            $table->string('departamento')->nullable();
            $table->string('codigo_localidad')->nullable();
            $table->string('localidad')->nullable();
            $table->string('codigo_postal')->nullable();
            $table->string('telefonos')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('instituciones');
    }
}
