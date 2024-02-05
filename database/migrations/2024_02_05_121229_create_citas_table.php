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
        Schema::create('citas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('nombre_usuario');
            $table->unsignedBigInteger('nombre_peluquero');
            $table->unsignedBigInteger('nombre_servicio');
            $table->dateTime('fecha');
            $table->timestamps();

            $table->foreign('nombre_usuario')->references('nombre')->on('users');
            $table->foreign('nombre_peluquero')->references('nombre')->on('peluqueros');
            $table->foreign('nombre_servicio')->references('nombre')->on('servicios');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('citas');
    }
};
