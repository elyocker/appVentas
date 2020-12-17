<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmpresasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('empresas', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->integer('nit');
            $table->string('nombre');
            $table->integer('telefono')->nullable();
            $table->string('email')->unique();
            $table->unsignedBigInteger('id_departamento')->nullable();
            $table->foreign('id_departamento')->references('id')->on('departamentos')->onDelete('set null');
            $table->unsignedBigInteger('id_ciudad')->nullable();
            $table->foreign('id_ciudad')->references('id')->on('ciudades')->onDelete('set null');
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
        Schema::dropIfExists('empresas');
    }
}
