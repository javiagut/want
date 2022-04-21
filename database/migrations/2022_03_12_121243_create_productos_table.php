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
        Schema::create('productos', function (Blueprint $table) {
            $table->id()->unique();
            $table->string('nombre');
            $table->string('marca');
            $table->string('descripcion',500);
            $table->integer('id_categoria');
            $table->integer('rebaja')->nullable();
            $table->date('rebaja_inicio')->nullable();
            $table->date('rebaja_fin')->nullable();
            $table->string('estado');
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
        Schema::dropIfExists('productos');
    }
};
