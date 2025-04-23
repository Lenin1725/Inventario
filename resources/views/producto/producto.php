<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Agregar Producto</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container py-5">
        <h2 class="mb-4 text-center">Agregar Nuevo Producto</h2>

        <form method="POST" action="{{ route('producto.store') }}">
            @csrf

            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre del Producto</label>
                <input type="text" name="nombre" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="cantidad" class="form-label">Cantidad</label>
                <input type="number" name="cantidad" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="precio" class="form-label">Precio</label>
                <input type="number" name="precio" class="form-control" step="0.01" required>
            </div>

            <div class="mb-3">
                <label for="descripcion" class="form-label">Descripción</label>
                <textarea name="descripcion" class="form-control"></textarea>
            </div>

            <button type="submit" class="btn btn-success">Guardar Producto</button>
            <a href="/dashboard" class="btn btn-secondary ms-2">Volver</a>
        </form>
    </div>
</body>
</html>
