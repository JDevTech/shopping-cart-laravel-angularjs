<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableTVentas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('t_ventas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('vtn_cliente', 150)->comment('Nombre completo del cliente');
            $table->decimal('vtn_valorsubtotal', 11, 2)->nullable()->comment('Valor sin impuestos segun el detalle de la venta.');
            $table->decimal('vtn_valortotal', 11, 2)->nullable()->comment('Valor con impuestos segun el detalle de la venta.');
            $table->enum('vtn_estado', ['Cotizacion', 'Confirmada', 'Pagada'])->comment('Estado de la venta.');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('t_productos');
    }
}
