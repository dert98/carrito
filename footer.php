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
            background-color: rgba(0, 0, 0, 0.8); /* Color de fondo semi-transparente */
            color: white; /* Color del texto */
            padding: 20px; /* Ajusta el espacio interno del footer */
            text-align: center; /* Alinea el contenido al centro */
            backdrop-filter: blur(5px); /* Aplica un difuminado de 5px al contenido detrás del footer */
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
    <footer class="footer mt-auto">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <h5>Redes Sociales</h5>
                    <ul class="list-unstyled">
                        <li><a href="#"><i class="fab fa-facebook"></i> Facebook</a></li>
                        <li><a href="#"><i class="fab fa-twitter"></i> Twitter</a></li>
                    </ul>
                </div>
                <div class="col-md-4">
                    <h5>Enlaces</h5>
                    <ul class="list-unstyled">
                        <li><a href="#"><i class="fab fa-instagram"></i> Instagram</a></li>
                        <li><a href="#"><i class="fab fa-linkedin"></i> LinkedIn</a></li>
                    </ul>
                </div>
                <div class="col-md-4">
                    <p>Dirección: 123 Calle Principal, Ciudad</p>
                    <p>Teléfono: +1234567890</p>
                    <p>Email: info@tudominio.com</p>
                </div>
            </div>
        </div>
        <div>
            <p class="text-center">Copyright DertDriver @2024</p>
        </div>
    </footer>
</body>
</html>
