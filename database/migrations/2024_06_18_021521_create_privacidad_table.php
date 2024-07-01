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
        Schema::create('privacidad', function (Blueprint $table) {
            $table->id('pk_privacidad')->autoIncrement();
            $table->string('nombre_priv', 15);
            $table->unsignedBigInteger('fk_clip');
            $table->foreign('fk_clip')->references('pk_clip')->on('clip');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('privacidad');
    }
};
