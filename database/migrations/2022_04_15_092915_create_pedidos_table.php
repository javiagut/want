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
    public function up(){
        Schema::create('pedidos', function (Blueprint $table) {
            $table->id()->unique();
            $table->bigInteger('id_cliente')->nullable();
            $table->string('estado');
            $table->string('sesion')->nullable();
            $table->float('total')->nullable();
            $table->timestamps();
            $table->foreign('id_cliente')->references('id')->on('clientes');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pedidos');
    }
};
