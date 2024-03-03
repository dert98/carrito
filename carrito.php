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
    <div id="app">
        <div v-for="product in cart" :key="product.id">
            <div class="card s1 p-2 m-2">
                <img :src="product.image" class="card-img-top" alt="">
                <div class="card-body">
                    <h5 class="card-title">{{ product.nombre }}</h5>
                    <p class="card-text">{{ product.descripcion }}</p>
                    <p class="card-text">${{ product.precio }}</p>
                    <p class="card-text">Cantidad: {{ product.cantidad }}</p>
                    <p class="card-text">Subtotal: ${{ product.cantidad * product.precio }}</p>
                    <button @click="increaseQuantity(product)" class="btn btn-success">+</button>
                    <button @click="decreaseQuantity(product)" class="btn btn-danger">-</button>
                    <button @click="removeFromCart(product)" class="btn btn-warning">Eliminar</button>
                </div>
            </div>
        </div>
        <div class="mt-3">
            <h5>Total a pagar: ${{ totalAmount }}</h5>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/vue@2"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script>
         new Vue({
            el: '#app',
            data: {
                products: [],
                cart: [], // Array para almacenar los productos en el carrito
                categoria_id: null, // Variable para almacenar el ID de la categoría seleccionada
                total: 0 // Variable para almacenar el total a pagar del carrito
            },
            mounted() {
                // Obtener el ID de la categoría desde la URL
                const urlParams = new URLSearchParams(window.location.search);
                this.categoria_id = urlParams.get('categoria_id');

                // Realizar una solicitud HTTP para obtener los productos desde la API PHP
                axios.get('addcarrito.php?tipe=show')
                .then(response => {
                    this.cart = response.data;
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
            },
            computed: {
                // Método computado para calcular el total a pagar del carrito
                totalAmount() {
                    return this.cart.reduce((total, product) => {
                        return total + (product.precio * product.cantidad);
                    }, 0);
                }
            }
        });
    </script>
</body>
    
</html>
