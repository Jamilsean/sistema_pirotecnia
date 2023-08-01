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
        Schema::create('unidad_productos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('productos_id')->nullable()->references('id')->on('productos')->onDelete('cascade');
            $table->foreignId('unidades_id')->nullable()->references('id')->on('unidades')->onDelete('cascade');
            $table->string('estado')->default('disponible');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('unidad_productos');
    }
};
