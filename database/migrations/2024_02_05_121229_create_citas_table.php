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
            $table->unsignedBigInteger('user_id'); // Cambié el nombre a user_id
            $table->unsignedBigInteger('peluquero_id');
            $table->unsignedBigInteger('servicio_id');
            $table->dateTime('fecha');
            $table->timestamps();
        
            $table->foreign('user_id')->references('id')->on('users'); // Referencia a la columna 'id' en la tabla 'users'
            $table->foreign('peluquero_id')->references('id')->on('peluqueros'); // Referencia a la columna 'id' en la tabla 'peluqueros'
            $table->foreign('servicio_id')->references('id')->on('servicios'); // Referencia a la columna 'id' en la tabla 'servicios'
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
