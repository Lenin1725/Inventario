<!-- resources/views/productos/ticket.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Ticket de Venta</h2>

        <!-- Mostrar el detalle de la venta -->
        <div class="mb-4">
            <strong>Fecha:</strong> {{ now()->format('d/m/Y H:i:s') }}
        </div>

        <div>
            <strong>Cliente:</strong> {{ $cliente ?? 'Cliente Anónimo' }}
        </div>

        <hr>

        <h4>Productos Comprados:</h4>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Producto</th>
                    <th>Cantidad</th>
                    <th>Precio Unitario</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($venta->productos as $producto)
                    <tr>
                        <td>{{ $producto->name }}</td>
                        <td>{{ $producto->pivot->cantidad }}</td>
                        <td>${{ number_format($producto->price, 2) }}</td>
                        <td>${{ number_format($producto->pivot->cantidad * $producto->price, 2) }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <hr>

        <div class="mb-3">
            <strong>Subtotal:</strong> ${{ number_format($subtotal, 2) }}
        </div>

        @if ($iva)
            <div class="mb-3">
                <strong>IVA (16%):</strong> ${{ number_format($ivaAmount, 2) }}
            </div>
        @endif

        <div class="mb-3">
            <strong>Total a Pagar:</strong> ${{ number_format($total, 2) }}
        </div>

        <hr>

        <div class="text-center">
            <p>¡Gracias por su compra!</p>
            <a href="{{ route('productos.index') }}" class="btn btn-primary">Volver al Inventario</a>
        </div>
    </div>
@endsection