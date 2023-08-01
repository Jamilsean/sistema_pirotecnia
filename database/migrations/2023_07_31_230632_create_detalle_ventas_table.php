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
        Schema::create('detalle_ventas', function (Blueprint $table) {
            $table->id();
            $table->string('cantidad');
            $table->double('precio_venta');
            $table->double('estado');
            $table->foreignId('ventas_id')->nullable()->references('id')->on('ventas')->onDelete('cascade');
            $table->foreignId('almacen_productos_id')->nullable()->references('id')->on('almacen_productos')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detalle_ventas');
    }
};
