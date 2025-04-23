<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('ventas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('producto_id')->constrained()->onDelete('cascade'); // Relación con productos
            $table->integer('cantidad'); // Cantidad vendida
            $table->decimal('total', 8, 2); // Total de la venta
            $table->boolean('factura')->default(false); // Si la venta tiene factura
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('ventas');
    }
};