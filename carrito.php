<!DOCTYPE html>
<html lang="en">
<<<<<<< Updated upstream

=======
>>>>>>> Stashed changes
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
<<<<<<< Updated upstream
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://dert98.github.io/Porfolio/global.css">

</head>

<body>
    <div class="text-center">
        <label for="" class="h1">Carrito</label>
        <div class="row row-cols-md-8">
            <div id='app'>
                <div class="row">
                    <div class="col">
                        <?php
                            session_start();

                            // Verifica si $_SESSION['cart'] está definida y no es nula
                            if (isset($_SESSION['cart']) && $_SESSION['cart'] !== null) {
                                // Si $_SESSION['cart'] tiene elementos, muestra los detalles del carrito
                                echo '<div class="row">';
                                foreach ($_SESSION['cart'] as $item) {
                                    // Aquí puedes imprimir los detalles de cada elemento del carrito
                                    echo '<div class="card s1">';
                                        echo '<div class="card-body">';
                                            echo '<h5 class="card-title">' . $item['nombre'] . '</h5>';
                                            echo '<p class="card-text">' . $item['descripcion'] . '</p>';
                                            echo '<p class="card-text">' . $item['precio'] . '</p>';
                                        echo '</div>';
                                    echo '</div>';
                                }
                                echo '</div>'; // Cierre del div row
                            } else {
                                // Si $_SESSION['cart'] está vacía o es nula, muestra un mensaje indicando que el carrito está vacío
                                echo "<p>El carrito está vacío.</p>";
                            }
                        ?>
                        <p class="p-2">
                            <label for="">Cantidada de Productos: </label>
                            <label for="">
                                <?php 
        echo (count($_SESSION['cart'] ));
    ?>
                            </label>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

=======
    <link rel="stylesheet" href="https://dert98.github.io/Porfolio/global.css">
    <script src="https://cdn.jsdelivr.net/npm/vue@2.6.14/dist/vue.js"></script>
</head>
<body id="app">
<div>
    <h2>Products</h2>
    <ul>
        <li v-for="product in products" :key="product.id">
            {{ product.name }} - ${{ product.price }}
            <button @click="addToCart(product)">Add to Cart</button>
        </li>
    </ul>
</div>

<script>
    new Vue({
        el: '#app',
        data: {
            products: []
        },
        mounted() {
            // Realizar una solicitud HTTP para obtener los productos desde la API PHP
            axios.get('obtener_productos.php')
                .then(response => {
                    this.products = response.data;
                })
                .catch(error => {
                    console.error('Error al obtener los productos:', error);
                });
        },
        methods: {
            // Agregar métodos para manejar el carrito de compras
        }
    });
</script>
</body>
>>>>>>> Stashed changes
</html>