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
        Schema::create('almacen_productos', function (Blueprint $table) {
            $table->id();
            $table->date('fecha_ingreso');
            $table->integer('cantidad');
            $table->double('precio_entrada');
            $table->double('precio_venta');
            $table->foreignId('productos_id')->nullable()->references('id')->on('productos')->onDelete('cascade');
            $table->foreignId('empresas_id')->nullable()->references('id')->on('empresas')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('almacen_productos');
    }
};
