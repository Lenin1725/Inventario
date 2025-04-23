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
            $table->string('descripcion')->nullable(); // Descripción del producto
            $table->decimal('precio', 8, 2); // Precio
            $table->integer('stock'); // Cantidad disponible
            $table->string('categoria')->nullable(); // Categoría opcional
            $table->timestamps(); // created_at, updated_at
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('productos');
    }
};
