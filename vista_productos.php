<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Productos por Categoría</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container" id="app">
    <div class="container">
        <h1 class="mt-5 text-center">Productos por
            <?php
                if (isset ($nombre_categoria)){
                    echo $nombre_categoria;
                }else{
                    echo 'Categoria';
                }
            ?>
        </h1>
        <div class="row row-cols-1 row-cols-md-3 g-4">
            <div>
                <h2>Products</h2>
                <ul>
                    <li v-for="product in products" :key="product.id">
                        {{ product.name }} - ${{ product.price }}
                        <button @click="addToCart(product)">Add to Cart</button>
                    </li>
                </ul>
            </div>
        </div>
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
