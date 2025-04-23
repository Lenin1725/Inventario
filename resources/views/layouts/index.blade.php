<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Inicio</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    
</head>
<body class="bg-light">
    <div class="container py-5 text-center">
        <h1 class="mb-4">¡Bienvenido a tu cuenta!</h1>
        <p>Has iniciado sesión correctamente.</p>

        <div class="d-grid gap-3 col-6 mx-auto my-4">
        <a href="{{ route('producto.create') }}" class="btn btn-success">Agregar Producto</a>

            <a href="#" class="btn btn-danger">Eliminar Producto</a>
            <a href="#" class="btn btn-warning text-white">Editar Producto</a>
        </div>


        <a href="{{ route('logout') }}" class="btn btn-secondary mt-3">Cerrar sesión</a>
    </div>
</body>
</html>
