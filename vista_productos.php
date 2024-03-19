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
            <h1 class="mt-5 text-center bb1 fw-bold">
                <?php
                if (!isset($_GET['categoria_id']) || empty($_GET['categoria_id'])) {
                    echo "Nuevos Productos";
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
            <div id='app'>
                <!-- Bootstrap Modal for confirmation message -->
                <div class="modal fade" id="confirmationModal" tabindex="-1" aria-labelledby="confirmationModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header bg-success">
                                <h5 class="modal-title text-light text-center" id="confirmationModalLabel">Producto Agregado Exitosamente</h5>
                            </div>
                        </div>
                    </div>
                </div>



                <div v-if="products.length > 0" class="row row-cols-md-4 d-flex justify-content-between">
                    <div class="col-md-3" v-for="product in products" :key="product.id">
                        <a :href="'productos-detalle.php?id=' + product.id" class="text-decoration-none">
                            <div class="card hr1 s1 p-2 m-2 d-flex flex-column">
                                <img :src="'./img/p' + product.id + '/1.webp'" class="card-img-top img-fluid bg2" alt=""
                                    style="max-width: 100%; height: auto;">
                                <div class="card-body">
                                    <h5 class="card-title">{{ product.nombre }}</h5>
                                    <details>
                                        <p class="card-text">{{ product.descripcion }}</p>
                                    </details>
                                    <p class="card-text">${{ product.precio }}</p>
                                </a>
                                    <button @click="addToCart(product)" class="btn btn-primary mt-auto">Add to Cart</button>
                                </div>
                            </div>
                    </div>
                </div>
                
                
                <div v-else>
                    <div class="row">
                        <div class="col">
                            <div class="card hr1 s1 p-2 m-2">
                                <div class="card-body">
                                    <p class="card-text">No hay productos disponibles.</p>
                                </div>
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
                cart: JSON.parse(localStorage.getItem('cart')) || [],
                categoria_id: null,
                totalProductsInCart: 0,
                confirmationMessage: '', // Confirmation message property
                productAdded: {} // Product added to cart property
            },
            mounted() {
                const urlParams = new URLSearchParams(window.location.search);
                this.categoria_id = urlParams.get('categoria_id');

                if (localStorage.getItem('cart')) {
                    this.cart = JSON.parse(localStorage.getItem('cart'));
                }

                this.fetchProducts();
                this.calculateTotalProductsInCart();
            },
            methods: {
                fetchProducts() {
                    axios.get('obtener_productos.php', {
                        params: {
                            categoria_id: this.categoria_id
                        }
                    })
                        .then(response => {
                            this.products = response.data;
                        })
                        .catch(error => {
                            console.error('Error al obtener los productos:', error);
                        });
                },
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
                            cantidad: 1,
                            imagen: product.imagen
                        });
                    }
                    this.updateCart();
                    this.calculateTotalProductsInCart();
                    this.confirmationMessage = 'Producto agregado al carrito.';
                    this.productAdded = product; // Set the product added to cart
                    var myModal = new bootstrap.Modal(document.getElementById('confirmationModal'));
                    myModal.show();
                },
                removeFromCart(product) {
                    this.cart = this.cart.filter(item => item.id !== product.id);
                    this.updateCart();
                    this.calculateTotalProductsInCart();
                },
                increaseQuantity(product) {
                    product.cantidad++;
                    this.updateCart();
                    this.calculateTotalProductsInCart();
                },
                decreaseQuantity(product) {
                    if (product.cantidad > 1) {
                        product.cantidad--;
                        this.updateCart();
                        this.calculateTotalProductsInCart();
                    }
                },
                updateCart() {
                    localStorage.setItem('cart', JSON.stringify(this.cart));
                    axios.post('addcarrito.php', {
                        cart: this.cart
                    }).then(() => {
                        // Recargar la página después de un cierto período de tiempo (por ejemplo, 2 segundos)
                        setTimeout(() => {
                            window.location.reload();
                        }, 2000); // 2000 milisegundos = 2 segundos
                    }).catch(error => {
                        console.error('Error al actualizar el carrito:', error);
                    });
                },
                calculateTotalProductsInCart() {
                    this.totalProductsInCart = this.cart.reduce((total, item) => total + item.cantidad, 0);
                }
            }
        });

    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>