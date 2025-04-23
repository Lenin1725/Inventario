<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('productos', function (Blueprint $table) {
            $table->id(); // Llave primaria
            $table->string('nombre'); // Nombre del producto
            $table->string('descripcion')->nullable(); // Descripción del producto (opcional)
            $table->decimal('precio', 8, 2); // Precio del producto
            $table->integer('stock'); // Cantidad en stock
            $table->string('categoria')->nullable(); // Categoría del producto (opcional)
            $table->timestamps(); // created_at y updated_at
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('productos'); // Eliminar la tabla productos si existe
    }
};