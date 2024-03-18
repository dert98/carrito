<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <style>
        .whatsapp-icon,
        .other-icon {
            position: fixed;
            width: 50px; /* Ajusta el tamaño según sea necesario */
            height: 50px; /* Ajusta el tamaño según sea necesario */
            z-index: 1000; /* Asegura que estén por encima de otros elementos */
            cursor: pointer;
        }

        .whatsapp-icon {
            bottom: 20px;
            right: 20px;
        }

        .other-icon {
            bottom: 100px; /* Ajusta la posición vertical según sea necesario */
            right: 20px;
        }
        .icon-black {
            filter: invert(100%);
        }
    </style>
    <!-- Primer icono -->
    <a href="/carrito/carrito.php" class="whatsapp-link">
        <img src="img/wsp.png" alt="WhatsApp" class="whatsapp-icon">
    </a>
    <!-- Segundo icono -->
</body>
</body>
</html>