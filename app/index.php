<?php
// Iniciar la sesión
session_start();

// Verificar si la variable de sesión 'usuario' está definida y no es nula
if(isset($_SESSION['usuario'])) {
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Available CRUD pages</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            padding: 20px;
        }
        .form-group {
            margin-bottom: 20px;
        }
        .btn {
            margin-right: 10px;
        }
    </style>
</head>
<body>
    <div class="container text-center">
        <legend>Modo Administrador</legend>
        <div class="form-group">
            <p>Seleccione la base de datos a trabajar</p>
            <a href="/carrito" class="btn btn-secondary">Back</a>
            <a href="categorias-index.php" class="btn btn-primary" role="button">Categorías</a>
            <a href="productos-index.php" class="btn btn-primary" role="button">Productos</a>
            <a href="login/cerrar_sesion.php" class="btn btn-danger" role="button">Cerrar Sesion</a>
            <!-- TABLE_BUTTONS -->
        </div>
    </div>
</body>
</html>
<?php
} else {
    // Si la sesión no está iniciada, redirigir al usuario a la página de inicio de sesión
    header('Location: /carrito/login/login.php');
    exit();
}
?>

