@extends('layouts.app') <!-- si usas layouts, si no quita esta línea -->

@section('content')
<div class="container">
    <h2>Agregar Producto</h2>

    <form action="{{ route('producto.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre del producto</label>
            <input type="text" name="nombre" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="cantidad" class="form-label">Cantidad</label>
            <input type="number" name="cantidad" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="precio" class="form-label">Precio</label>
            <input type="number" step="0.01" name="precio" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="descripcion" class="form-label">Descripción</label>
            <textarea name="descripcion" class="form-control"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Guardar</button>
    </form>
</div>
@endsection
