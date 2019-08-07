<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableTDetalleventa extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('t_detalleventa', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('dll_venta')->comment('Llave foranea relacionada con la tabla de ventas.');
            $table->unsignedBigInteger('dll_producto')->comment('Llave foranea relacionada con la tabla de productos.');
            $table->integer('dll_cantidad')->comment('Cantidad solicitada a comprar por el cliente.');
            $table->decimal('dll_preciounitario',11,2)->comment('Valor unitario del producto con el que se registra la venta.');
            $table->decimal('dll_valoriva',11,2)->comment('Valor de iva aplicado para el producto en esta venta.');
            $table->decimal('dll_subtotal',11,2)->comment('Valor sin impuestos calculados de acuerdo al valor del producto y la cantidad solicitada.');
            $table->decimal('dll_total',11,2)->comment('Valor con impuestos calculados de acuerdo al valor del producto y la cantidad solicitada.');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('dll_venta')->references('id')->on('t_ventas')->onDelete('cascade');
            $table->foreign('dll_producto')->references('id')->on('t_productos')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('t_detalleventa');
    }
}
