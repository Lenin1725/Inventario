<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    // app/Http/Controllers/ProductController.php

public function create()
{
    return view('productos.create'); // Asegúrate de tener esta vista
}
    public function store(Request $request)
    {
        // Validar los datos que vienen del formulario
        $validated = $request->validate([
            'nombre' => 'required|string|max:255',
            'cantidad' => 'required|integer|min:0',
            'precio' => 'required|numeric|min:0',
            'descripcion' => 'nullable|string|max:1000',
        ]);

        // Guardar en la base de datos
        Product::create($validated);

        // Redirigir al dashboard con mensaje
        return redirect('/dashboard')->with('success', 'Producto agregado correctamente.');
    }
}
