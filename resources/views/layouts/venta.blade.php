<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inventario de Productos</title>
    <!-- Agregar Bootstrap para diseño -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

    <div class="container mt-4">
        <h1>Inventario de Productos</h1>

        <!-- Formulario para buscar productos -->
        <form method="GET" action="{{ route('productos.index') }}" class="mb-4">
            <div class="row">
                <div class="col-md-8">
                    <input type="text" class="form-control" name="search" placeholder="Buscar producto..." value="">
                </div>
                <div class="col-md-4">
                    <button type="submit" class="btn btn-primary w-100">Buscar</button>
                </div>
            </div>
        </form>

        <!-- Tabla para mostrar los productos -->
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nombre del Producto</th>
                    <th>Cantidad</th>
                    <th>Precio</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>Bulto de cemento</td>
                    <td>20</td>
                    <td>$200</td>
                    <td>5</td>
                        <!-- Enlace para editar -->
                        <a href="{{ route('productos.edit', $producto->id) }}" class="btn btn-warning btn-sm">Editar</a>
                        
                        <!-- Formulario para eliminar producto -->
                        <form action="{{ route('productos.destroy', $producto->id) }}" method="POST" style="display:inline-block;">
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro de que quieres eliminar este producto?')">Eliminar</button>
                        </form>
                    </td>
                </tr>
            </tbody>
        </table>

        <!-- Enlace para agregar un nuevo producto -->
        <a href="{{ route('productos.create') }}" class="btn btn-success mt-3">Agregar Producto</a>
    </div>

    <!-- Agregar Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
