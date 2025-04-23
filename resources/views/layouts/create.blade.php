<!-- resources/views/productos/create.blade.php -->
@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Agregar Producto al Inventario</h2>
        <form action="{{ route('productos.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="name">Nombre del Producto</label>
                <input type="text" name="name" id="name" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="description">Descripción</label>
                <textarea name="description" id="description" class="form-control"></textarea>
            </div>
            <div class="form-group">
                <label for="price">Precio</label>
                <input type="number" name="price" id="price" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="quantity">Cantidad</label>
                <input type="number" name="quantity" id="quantity" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Agregar Producto</button>
        </form>
    </div>
@endsection