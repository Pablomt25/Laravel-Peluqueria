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
        Schema::create('calendario', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('usuario');
            $table->unsignedBigInteger('servicio');
            $table->unsignedBigInteger('peluquero');
            $table->date('start');
            $table->date('end');
            $table->time('start_time');
            $table->time('end_time');
            $table->text('description')->nullable();
            $table->string('color')->nullable();
            $table->timestamps();

            $table->foreign('usuario')->references('id')->on('users');
            $table->foreign('servicio')->references('id')->on('servicios');
            $table->foreign('peluquero')->references('id')->on('peluqueros');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('calendario');
    }
};