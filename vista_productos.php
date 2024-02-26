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
                if (!isset($_GET['categoria_id']) || empty($_GET['categoria_id'])) {
                    echo "Categoria";
                } else {
                    $id_categoria = $_GET['categoria_id'];
                    $sql = "SELECT nombre FROM categorias WHERE id = $id_categoria";
                    $resultado = mysqli_query($conn, $sql);
                    if (mysqli_num_rows($resultado) > 0) {
                        $fila = mysqli_fetch_assoc($resultado);
                        echo $fila['nombre'];
                    }
                }
                
            ?>
        </h1>
        <div class="row row-cols-1 row-cols-md-3 g-4">
            <div id='app'>
                <h2>Productos</h2>
                <div class="row">
                    <div class="col" v-for="product in products" :key="product.id">
                        <div class="card">
                            <img :src="product.image" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">{{ product.nombre }}</h5>
                                <p class="card-text">${{ product.descripcion }}</p>
                                <p class="card-text">${{ product.precio }}</p>
                                <button @click="addToCart(product)" class="btn btn-primary">Add to Cart</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/vue@2"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script>
        new Vue({
            el: '#app',
            data: {
                products: [],
                cart: [] // Array para almacenar los productos en el carrito
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
                // Método para agregar un producto al carrito
                addToCart(product) {
                    this.cart.push(product);
                    console.log('Producto agregado al carrito:', product);
                },
                // Agregar otros métodos para manejar el carrito de compras según tus necesidades
            }
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
