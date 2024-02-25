<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Productos por Categoría</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container">
    <div class="container">
        <h1 class="mt-5 text-center">Productos por
            <?php
            echo $nombre_categoria;
            ?>
        </h1>
        <div class="row row-cols-1 row-cols-md-3 g-4">
            <?php foreach($productos as $producto): ?>
            <div class="col">
                <div class="card">
                    <img decoding="async" src="./img/2.webp" class="jet-banner__img" loading="lazy" width="372" height="372">
                    <img src="<?php echo $producto['imagen']; ?>" class="card-img-top" alt="Imagen del producto">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $producto['nombre']; ?></h5>
                        <p class="card-text"><?php echo $producto['descripcion']; ?></p>
                        <p class="card-text">Precio: $<?php echo $producto['precio']; ?></p>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
