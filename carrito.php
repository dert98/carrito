<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrito de Compras</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://dert98.github.io/Porfolio/global.css">
</head>

<body>
    <div class="container">
        <h1 class="text-center mt-5">Carrito de Compras</h1>
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="row row-cols-1 row-cols-md-4 g-4">
                    <?php
                    // Inicia la sesión si no está iniciada
                    if (!isset($_SESSION)) {
                        session_start();
                    }

                    // Verifica si $_SESSION['cart'] está definida y no es nula
                    if (isset($_SESSION['cart']) && $_SESSION['cart'] !== null) {
                        // Creamos un array auxiliar para almacenar la cantidad de cada producto
                        $productCounts = array();
                        $totalPrice = 0; // Inicializamos el total a pagar en 0

                        // Recorremos el carrito para contar la cantidad de cada producto y calcular el total a pagar
                        foreach ($_SESSION['cart'] as $item) {
                            $productId = $item['id'];
                            // Si el producto ya existe en el array, incrementamos su contador
                            if (array_key_exists($productId, $productCounts)) {
                                $productCounts[$productId]++;
                            } else {
                                // Si es la primera vez que encontramos el producto, inicializamos su contador en 1
                                $productCounts[$productId] = 1;
                            }
                            // Sumamos el precio del producto multiplicado por su cantidad al total a pagar
                            $totalPrice += $item['precio'] * $item['cantidad'];
                        }

                        // Mostramos los detalles del carrito junto con la cantidad de cada producto
                        foreach ($_SESSION['cart'] as $item) {
                            // Aquí puedes imprimir los detalles de cada elemento del carrito en un card separado
                            echo '<div class="col">';
                            echo '<div class="card">';
                            echo '<div class="card-body">';
                            echo '<div style="" class="card-img"><img src="./img/p_1/1.webp" alt="" srcset=""></div>';
                            echo '<h5 class="card-title">' . $item['nombre'] . '</h5>';
                            echo '<p class="card-text">Precio:' . $item['precio'] . '</p>';
                            echo '<p class="card-text">Cantidad: <span id="quantity-' . $item['id'] . '">' . $item['cantidad'] . '</span></p>';
                            // Agregar botones para aumentar y disminuir la cantidad de cada producto
                            echo '<button class="btn btn-success" onclick="increaseQuantity(' . $item['id'] . ')">+</button>';
                            echo '<button class="btn btn-danger" onclick="decreaseQuantity(' . $item['id'] . ')">-</button>';
                            echo '</div>';
                            echo '</div>';
                            echo '</div>';
                        }

                        // Mostrar el total a pagar
                        echo '<div class="col-md-12">';
                        echo '<div class="card">';
                        echo '<div class="card-body">';
                        echo '<h5 class="card-title">Total a Pagar:</h5>';
                        echo '<p class="card-text" id="total-price">$' . $totalPrice . '</p>'; // Mostrar el precio total
                        echo '</div>';
                        echo '</div>';
                        echo '</div>';
                    } else {
                        // Si $_SESSION['cart'] está vacía o es nula, muestra un mensaje indicando que el carrito está vacío
                        echo "<p>El carrito está vacío.</p>";
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>

    <script>
    // Función para aumentar la cantidad de un producto
    function increaseQuantity(productId) {
        var quantityElement = document.getElementById('quantity-' + productId);
        var quantity = parseInt(quantityElement.innerText);
        quantity++;
        quantityElement.innerText = quantity;
        // Envía la información actualizada al servidor para actualizar el carrito
        // Puedes usar AJAX o cualquier método para enviar la información al servidor
        updateTotalPrice();
    }

    // Función para disminuir la cantidad de un producto
    function decreaseQuantity(productId) {
        var quantityElement = document.getElementById('quantity-' + productId);
        var quantity = parseInt(quantityElement.innerText);
        if (quantity > 1) {
            quantity--;
            quantityElement.innerText = quantity;
            // Envía la información actualizada al servidor para actualizar el carrito
            // Puedes usar AJAX o cualquier método para enviar la información al servidor
            updateTotalPrice();
        }
    }

    // Función para actualizar el precio total
    function updateTotalPrice() {
        // Obtener todas las cantidades y precios de los productos en el carrito
        var quantities = document.querySelectorAll('[id^="quantity-"]');
        var prices = document.querySelectorAll('.card-text[id^="price-"]');
        var totalPrice = 0;

        // Calcular el nuevo precio total sumando el precio de cada producto multiplicado por su cantidad
        for (var i = 0; i < quantities.length; i++) {
            var quantity = parseInt(quantities[i].innerText);
            var price = parseFloat(prices[i].innerText.replace('$', ''));
            totalPrice += quantity * price;
        }

        // Actualizar el precio total en la interfaz
        document.getElementById('total-price').innerText = '$' + totalPrice.toFixed(2);
    }
    </script>
</body>

</html>
