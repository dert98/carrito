<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tienda en Línea</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Agrega el enlace al archivo CSS de FontAwesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-hGyikdO9EXmGjTtBEpYH0Lkbq7l/6slmSjqU6ZT69rcdf/Vny9klXhD5v0ibJlrGAV3yF1hK40cXYlH5NMDrLg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
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
</head>
<body>
    <?php
        include 'conec.php';
        include 'slider.php';
        include 'navbar.php';
        include 'principal.php';
        include 'footer.php';
    ?>
    <!-- Primer icono -->
    <a href="https://wa.me/tunumero" target="_blank" class="whatsapp-link">
        <img src="img/wsp.png" alt="WhatsApp" class="whatsapp-icon">
    </a>
    <!-- Segundo icono -->
    <a href="carrito.php" class="other-link">
        <img src="https://olivostore.pe/wp-content/uploads/2022/02/icon-delivery.png" alt="Otro" class="other-icon icon-black">
    </a>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
