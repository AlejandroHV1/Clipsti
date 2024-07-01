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
        Schema::create('usuario', function (Blueprint $table) {
            $table->id('pk_usuario')->autoIncrement();
            $table->string('email')->unique();
            $table->string('password');
            $table->string('user', 50);
            $table->integer('cantidad_clips')->nullable();
            $table->smallInteger('estatus');
            $table->unsignedBigInteger('fk_tipo_usuario');
            $table->foreign('fk_tipo_usuario')->references('pk_tipo_usuario')->on('tipo_usuario');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('usuario');
    }
};
