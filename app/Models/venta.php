<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Venta extends Model
{
    use HasFactory;

    // La tabla asociada al modelo
    protected $table = 'ventas';  // Si el nombre de la tabla es diferente, cámbialo aquí

    // Los atributos que se pueden asignar masivamente
    protected $fillable = [
        'iva',  // Para saber si la venta tiene IVA
        'total', // Total de la venta
        'fecha_venta', // Fecha en que se realizó la venta
    ];

    // Relación de muchos a muchos con los productos
    public function productos()
    {
        return $this->belongsToMany(Producto::class) // Relación muchos a muchos con el modelo Producto
                    ->withPivot('cantidad') // La columna pivot que guarda la cantidad de productos vendidos
                    ->withTimestamps(); // Para guardar las marcas de tiempo de la relación
    }

    // Si quieres agregar el IVA de manera dinámica en el modelo (opcional)
    public function getIvaAmountAttribute()
    {
        $subtotal = $this->productos->sum(function ($producto) {
            return $producto->pivot->cantidad * $producto->price; // Suponiendo que 'price' es el precio del producto
        });

        return $subtotal * 0.16; // Calculamos el 16% de IVA
    }

    // Obtener el total con IVA incluido
    public function getTotalWithIvaAttribute()
    {
        return $this->total + $this->iva_amount; // Total más el IVA calculado
    }
}