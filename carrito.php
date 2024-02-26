<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>