<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableTProductos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('t_productos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('prd_nombreproducto', 150)->comment('Nombre del producto registrado.');
            $table->decimal('prd_valorproducto', 11,2)->comment('Precio del producto registrado.');
            $table->decimal('prd_valoriva', 11,2)->comment('Valor de iva aplicado al producto.');
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
