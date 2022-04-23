<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stock', function (Blueprint $table) {

            //$table->engine = "InnoBD";

            $table->id()->unique();
            $table->bigInteger('id_producto');
            $table->bigInteger('id_talla');
            $table->bigInteger('id_color');
            $table->string('sexo')->nullable();
            $table->float('precio');
            $table->integer('stock')->nullable();
            $table->integer('ventas')->nullable();
            $table->string('foto1');
            $table->string('foto2')->nullable();
            $table->string('foto3')->nullable();
            $table->string('foto4')->nullable();
            $table->string('foto5')->nullable();
            $table->timestamps();
            $table->foreign('id_producto')->references('id')->on('productos');
            $table->foreign('id_talla')->references('id')->on('tallas');
            $table->foreign('id_color')->references('id')->on('colores');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('stock');
    }
};
