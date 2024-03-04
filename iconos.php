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
    <a href="https://wa.me/tunumero" target="_blank" class="whatsapp-link">
        <img src="img/wsp.png" alt="WhatsApp" class="whatsapp-icon">
    </a>
    <!-- Segundo icono -->
    <a href="carrito.php" class="other-link">
        <img src="https://olivostore.pe/wp-content/uploads/2022/02/icon-delivery.png" alt="Otro" class="other-icon icon-black">
    </a>
</body>
</body>
</html>