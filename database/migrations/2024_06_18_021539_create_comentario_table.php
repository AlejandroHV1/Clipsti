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
        Schema::create('comentario', function (Blueprint $table) {
            $table->id('pk_comentario')->autoIncrement();
            $table->string('nombre_com', 500);
            $table->unsignedBigInteger('fk_usuario');
            $table->unsignedBigInteger('fk_clip');
            $table->foreign('fk_clip')->references('pk_clip')->on('clip');
            $table->foreign('fk_usuario')->references('pk_usuario')->on('usuario');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('comentario');
    }
};
