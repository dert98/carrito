<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://dert98.github.io/Porfolio/global.css">

</head>

<body>
    <div class="text-center">
        <label for="" class="h1">Carrito</label>
        <div class="row row-cols-md-8">
            <div id='app'>
                <div class="row container">
                    <div class="col">
                        <?php
                        session_start();
                        // Verifica si $_SESSION['cart'] está definida y no es nula
                        if (isset($_SESSION['cart']) && $_SESSION['cart'] !== null) {
                            // Si $_SESSION['cart'] tiene elementos, muestra los detalles del carrito
                            foreach ($_SESSION['cart'] as $item) {
                                // Aquí puedes imprimir los detalles de cada elemento del carrito
                                ?>
                                    <div class="card mb-3">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <img src="./img/p_1/1.webp" class="img-fluid rounded-start" alt="...">
                                            </div>
                                            <div class="col-md-8">
                                                <div class="card-body">
                                                    <h5 class="card-title">
                                                        <?php echo $item['nombre']; ?>
                                                    </h5>
                                                    <p class="card-text">
                                                        <?php echo $item['descripcion']; ?>
                                                    </p>
                                                    <p class="card-text">Precio: $
                                                        <?php echo $item['precio']; ?>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php
                                }
                            } else {
                                // Si $_SESSION['cart'] está vacía o es nula, muestra un mensaje indicando que el carrito está vacío
                                echo "<p class='text-center'>El carrito está vacío.</p>";
                            }
                            ?>
                        <p class="p-2">
                            <label for="">Cantidad de Productos:
                                <?php echo isset($_SESSION['cart']) ? count($_SESSION['cart']) : 0; ?>
                            </label>
                            <a href="whatsapp.php"><button class="btn btn-success" type="button">Comprar</button></a>
                        </p>
                    </div>
                </div>
            </div>
        </div>

    </div>
    </div>
</body>

</html>