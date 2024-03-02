<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Productos por Categoría</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://dert98.github.io/Porfolio/global.css">
</head>
<body>
<div class="container" id="app">
    <div class="container">
        <h1 class="mt-5 text-center"> 
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
        <div class="row row-cols-md-8">
            <div id='app'>
                <div class="row">
                    <div class="col" v-for="product in products" :key="product.id">
                        <div class="card hr1 s1 p-2 m-2">
                            <img :src="product.image" class="card-img-top" alt="">
                            <div class="card-body">
                                <h5 class="card-title">{{ product.nombre }}</h5>
                                <p class="card-text">{{ product.descripcion }}</p>
                                <p class="card-text">${{ product.precio }}</p>
                                <button @click="addToCart(product)" class="btn btn-primary">Add to Cart</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div>
        <ul>
            <li v-for="product in cart" :key="product.id">
            {{ product.id }} - {{ product.nombre }} - ${{ product.descripcion }}- ${{ product.precio }} - Cantidad: {{ product.cantidad }}
            <button @click="increaseQuantity(product)" class="btn btn-success">+</button>
            <button @click="decreaseQuantity(product)" class="btn btn-danger">-</button>
            <button @click="removeFromCart(product)" class="btn btn-warning">Eliminar</button>
            </li>
        </ul>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/vue@2"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script>
        new Vue({
            el: '#app',
            data: {
                products: [],
                cart: [], // Array para almacenar los productos en el carrito
                categoria_id: null // Variable para almacenar el ID de la categoría seleccionada
            },
            mounted() {
                // Obtener el ID de la categoría desde la URL
                const urlParams = new URLSearchParams(window.location.search);
                this.categoria_id = urlParams.get('categoria_id');

                // Realizar una solicitud HTTP para obtener los productos desde la API PHP
                axios.get('obtener_productos.php', {
                    params: {
                        categoria_id: this.categoria_id // Pasar el ID de la categoría como parámetro
                    }
                })
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
                    let cartItem = this.cart.find(item => item.id === product.id);
                    if (cartItem) {
                        cartItem.cantidad++;
                    } else {
                        this.cart.push({
                            id: product.id,
                            nombre: product.nombre,
                            descripcion: product.descripcion,
                            precio: product.precio,
                            cantidad: 1
                        });
                    }
                    axios.post('addcarrito.php', {
                        cart: this.cart
                    })
                },
                // Método para eliminar un producto del carrito
                removeFromCart(product) {
                    this.cart = this.cart.filter(item => item.id !== product.id);
                },
                // Método para aumentar la cantidad de un producto en el carrito
                increaseQuantity(product) {
                    product.cantidad++;
                },
                // Método para disminuir la cantidad de un producto en el carrito
                decreaseQuantity(product) {
                    if (product.cantidad > 1) {
                        product.cantidad--;
                    }
                }
            }
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
