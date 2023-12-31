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
        Schema::create('ventas', function (Blueprint $table) {
            $table->id();
            $table->string('estado')->default('vendido');
            $table->text('descripcion')->nullable();
            $table->foreignId('clientes_id')->nullable()->references('id')->on('clientes')->onDelete('cascade');
            $table->foreignId('tipo_pagos_id')->nullable()->references('id')->on('tipo_pagos')->onDelete('cascade');
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ventas');
    }
};
