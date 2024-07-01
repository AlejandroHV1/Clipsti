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
        Schema::create('clip', function (Blueprint $table) {
            $table->id('pk_clip')->autoIncrement();
            $table->string('nombre_clip', 100);
            $table->integer('estatus');
            $table->string('video', 100);
            $table->string('descripcion_clip', 100);
            $table->unsignedBigInteger('fk_tipojuego');
            $table->foreign('fk_tipojuego')->references('pk_tipo_juego')->on('tipo_juego');
            $table->unsignedBigInteger('fk_categoria');
            $table->foreign('fk_categoria')->references('pk_categoria')->on('categoria');
            $table->unsignedBigInteger('fk_usuario');
            $table->foreign('fk_usuario')->references('pk_usuario')->on('usuario');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clip');
    }
};
