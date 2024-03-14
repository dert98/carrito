<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            /* Establece la imagen de fondo */
            background-image: url('../img/silder1.jpg');
            /* Ajusta el tamaño de la imagen para cubrir toda la pantalla */
            background-size: cover;
            background-size: 100vw 100vh;
            /* Centra la imagen */
            background-position: center;
            /* Establece un color de texto claro para que sea legible sobre la imagen */
            color: white;
            /* Evita que la imagen de fondo se repita */
            background-repeat: no-repeat;
        }
        .login-container {
            margin-top: 100px;
        }
        .card {
            /* Hace el fondo del card transparente */
            background-color: rgba(255, 255, 255, 0.3); /* Blanco con 30% de opacidad */
            /* Borra cualquier borde */
            border: none;
        }
        .card-body {
            /* Hace el fondo del card-body transparente */
            background-color: transparent !important;
        }
    </style>
</head>
<body>
    <div class="container mt-4">
        <h2 class="text-center">Login</h2>
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card login-container">
                    <div class="card-body">
                        <form action="validar_login.php" method="POST">
                            <div class="form-group">
                                <label for="username">Username</label>
                                <input type="text" class="form-control" id="username" name="username" required>
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" class="form-control" id="password" name="password" required>
                            </div>
                            <button type="submit" class="btn btn-primary btn-block">Login</button>
                            <a href="/carrito/"><button class="btn btn-success btn-block mt-2" type="button">Regresar</button></a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
