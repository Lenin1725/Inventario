<!-- resources/views/productos/edit.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Editar Producto: {{ $producto->name }}</h2>

        <!-- Mostrar mensaje de éxito o error -->
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        @if(session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

        <!-- Formulario para editar el producto -->
        <form action="{{ route('productos.update', $producto->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="name" class="form-label">Nombre</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $producto->name) }}" required>
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Descripción</label>
                <textarea class="form-control" id="description" name="description">{{ old('description', $producto->description) }}</textarea>
            </div>

            <div class="mb-3">
                <label for="price" class="form-label">Precio</label>
                <input type="number" class="form-control" id="price" name="price" value="{{ old('price', $producto->price) }}" required>
            </div>

            <div class="mb-3">
                <label for="quantity" class="form-label">Cantidad</label>
                <input type="number" class="form-control" id="quantity" name="quantity" value="{{ old('quantity', $producto->quantity) }}" required>
            </div>

            <button type="submit" class="btn btn-primary">Actualizar Producto</button>
        </form>

        <a href="{{ route('productos.index') }}" class="btn btn-secondary mt-3">Volver al Inventario</a>
    </div>
@endsection