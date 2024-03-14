<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Footer con Imagen de Fondo</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"> <!-- Importa Font Awesome -->
    <style>
        .footer {
            background-image: url('img/footer.jpg');
            background-size: cover;
            color: white; /* Cambia el color del texto para que sea visible en la imagen */
            
        }
        .footer h5 {
            font-size: 20px; /* Aumenta el tamaño del texto */
            font-weight: bold; /* Hace el texto más audaz */
        }

        .footer p {
            font-size: 16px; /* Aumenta el tamaño del texto */
            font-weight: bold; /* Hace el texto más audaz */
        }
        .footer a,
        .footer a:visited {
            color: white; /* Cambia el color del texto de los enlaces a blanco */
        }
    </style>
</head>
<body>
    <footer class="footer mt-auto py-3">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <h5>Redes Sociales</h5>
                    <ul class="list-unstyled">
                        <li><a href="#"><i class="fab fa-facebook"></i> Facebook</a></li>
                        <li><a href="#"><i class="fab fa-twitter"></i> Twitter</a></li>
                        <li><a href="#"><i class="fab fa-instagram"></i> Instagram</a></li>
                        <li><a href="#"><i class="fab fa-linkedin"></i> LinkedIn</a></li>
                    </ul>
                </div>
                <div class="col-md-4">
                    <h5>Enlaces</h5>
                    <ul class="list-unstyled">
                        <li><a href="#">Inicio</a></li>
                        <li><a href="#">Productos</a></li>
                        <li><a href="#">Contacto</a></li>
                        <li><a href="#">Acerca de nosotros</a></li>
                    </ul>
                </div>
                <div class="col-md-4">
                    <h5>Contacto</h5>
                    <p>Dirección: 123 Calle Principal, Ciudad</p>
                    <p>Teléfono: +1234567890</p>
                    <p>Email: info@tudominio.com</p>
                </div>
            </div>
        </div>
    </footer>
</body>
</html>
