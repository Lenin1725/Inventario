<?php

namespace App\Http\Controllers;

use App\Models\Venta;
use App\Models\Producto;
use Illuminate\Http\Request;

class VentaController extends Controller
{
    // Mostrar el formulario de venta (opcional)
    public function index()
    {
        // Mostrar todos los productos disponibles para la venta
        $productos = Producto::all();
        return view('venta.index', compact('productos'));
    }

    // Generar el ticket de venta
    public function generarTicket($ventaId)
    {
        // Buscar la venta por su ID y cargar los productos relacionados
        $venta = Venta::with('productos')->findOrFail($ventaId);

        // Calcular el subtotal (precio * cantidad) de cada producto
        $subtotal = $venta->productos->sum(function ($producto) {
            return $producto->pivot->cantidad * $producto->price;
        });

        // Calcular el IVA (16%)
        $ivaAmount = 0;
        if ($venta->iva) { // Si se aplica IVA
            $ivaAmount = $subtotal * 0.16;
        }

        // Calcular el total (subtotal + IVA)
        $total = $subtotal + $ivaAmount;

        // Pasar la información a la vista del ticket
        return view('productos.ticket', compact('venta', 'subtotal', 'ivaAmount', 'total'));
    }

    // Crear una venta (por ejemplo, con productos y cantidades)
    public function store(Request $request)
    {
        // Validar los datos de la venta
        $request->validate([
            'productos' => 'required|array',  // Asegurarse de que los productos estén presentes
            'productos.*.id' => 'required|exists:productos,id',  // Asegurarse de que cada producto exista
            'productos.*.cantidad' => 'required|integer|min:1',  // Validar que la cantidad sea un número entero positivo
        ]);

        // Crear la venta
        $venta = new Venta();
        $venta->iva = $request->has('iva'); // Si se aplica IVA
        $venta->save(); // Guardar la venta

        // Asignar los productos a la venta
        foreach ($request->productos as $productoData) {
            // Verificar la existencia de la cantidad suficiente del producto
            $producto = Producto::findOrFail($productoData['id']);
            if ($producto->quantity < $productoData['cantidad']) {
                return redirect()->back()->with('error', 'No hay suficiente cantidad para este producto.');
            }

            // Asociar el producto a la venta con la cantidad comprada
            $venta->productos()->attach($producto->id, ['cantidad' => $productoData['cantidad']]);

            // Actualizar el inventario, restando la cantidad vendida
            $producto->decrement('quantity', $productoData['cantidad']);
        }

        return redirect()->route('venta.ticket', $venta->id); // Redirigir al ticket de la venta
    }
}
