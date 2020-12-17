<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVentasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ventas', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->string('num_factura');
            $table->integer('codigo');
            $table->string('productos');
            $table->integer('cantidad');
            $table->integer('iva');
            $table->integer('valor_total');
            $table->timestamp('fecha');
            $table->unsignedBigInteger('id_empresa')->nullable();
            $table->foreign('id_empresa')->references('id')->on('empresas')->onDelete('set null');
            $table->unsignedBigInteger('id_sucursal')->nullable();
            $table->foreign('id_sucursal')->references('id')->on('sucursales')->onDelete('set null');
            $table->unsignedBigInteger('id_bodega')->nullable();
            $table->foreign('id_bodega')->references('id')->on('bodegas')->onDelete('set null');
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
        Schema::dropIfExists('ventas');
    }
}
