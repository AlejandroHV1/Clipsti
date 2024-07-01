<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('tipo_juego', function (Blueprint $table) {
            $table->id('pk_tipo_juego')->autoIncrement();
            $table->string('nombre_tipo_juego', 20);
            $table->integer('estatus');
            $table->string('portada', 100);
            $table->unsignedBigInteger('fk_categoria');
            $table->foreign('fk_categoria')->references('pk_categoria')->on('categoria');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tipo_juego');
    }
};
