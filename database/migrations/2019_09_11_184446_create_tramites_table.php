<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTramitesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tramites', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->string('uid');
            $table->integer('tipo_gestion');
            $table->string('nombre');
            $table->string('afiliado');
            $table->string('centro');
            $table->string('email');
            $table->string('direccion');
            $table->string('telfax');
            $table->integer('estado');
            $table->bigInteger('tipo')->unsigned();
            $table->foreign('tipo')->references('id')->on('tipo_tramites');
            $table->mediumText('obs_alta')->nullable();
            $table->string('medico')->nullable();
            $table->mediumText('obs_medico')->nullable();
            $table->string('adjunto_form')->nullable();
            $table->string('adjunto_otros_1')->nullable();
            $table->string('adjunto_otros_2')->nullable();
            $table->mediumText('obs_audit')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tramites');
    }
}
