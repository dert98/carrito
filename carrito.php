<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalle del Carrito</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://dert98.github.io/Porfolio/global.css">
</head>

<body>
    <div class="container" id="app">
        <div class="row">
            <div class="col-lg-8">
                <div class="row">
                    <div class="col">
                        <h2 class="mt-5">Detalle del Carrito</h2>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div v-for="product in cart" :key="product.id" class="card mb-3">
                            <div class="row g-0">
                                <div class="col-md-4">
                                    <img :src="'img/p' + product.id + '/1.webp'" class="img-fluid rounded-start" alt="...">
                                </div>
                                <div class="col-md-8">
                                    <div class="card-body">
                                        <h5 class="card-title">{{ product.nombre }}</h5>
                                        <p class="card-text">{{ product.descripcion }}</p>
                                        <p class="card-text">Precio: ${{ product.precio }}</p>
                                        <p class="card-text">Cantidad: {{ product.cantidad }}</p>
                                        <p class="card-text">Subtotal: ${{ product.precio * product.cantidad }}</p>
                                        <div class="btn-group" role="group">
                                            <button @click="decreaseQuantity(product)" class="btn btn-secondary">-</button>
                                            <button @click="increaseQuantity(product)" class="btn btn-secondary">+</button>
                                            <button @click="removeFromCart(product)" class="btn btn-danger">Eliminar</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card mt-5">
                    <div class="card-body">
                        <h5 class="card-title">Total a pagar</h5>
                        <p class="card-text">Cantidad de productos: {{ totalProducts }}</p>
                        <p class="card-text">Total: ${{ totalAmount }}</p>
                        <!-- Botón de WhatsApp -->
                        <a :href="'whatsapp://send?phone=+542216124839&text=' + encodeURIComponent(mensaje)" target="_blank">
                            <button class="btn btn-success">Contactar por WhatsApp</button>
                        </a>
                        <!-- Botón para limpiar el carrito -->
                        <button @click="clearCart" class="btn btn-danger mt-2">Limpiar Carrito</button>
                        <!-- Botón para volver al inicio -->
                        <a href="./" class="btn btn-primary mt-2">Volver al Inicio</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <style>
        .whatsapp-icon,
        .other-icon {
            position: fixed;
            width: 50px; /* Ajusta el tamaño según sea necesario */
            height: 50px; /* Ajusta el tamaño según sea necesario */
            z-index: 1000; /* Asegura que estén por encima de otros elementos */
            cursor: pointer;
        }

        .whatsapp-icon {
            bottom: 20px;
            right: 20px;
        }

        .other-icon {
            bottom: 100px; /* Ajusta la posición vertical según sea necesario */
            right: 20px;
        }
        .icon-black {
            filter: invert(100%);
        }
    </style>
    <script src="https://cdn.jsdelivr.net/npm/vue@2"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script>
        new Vue({
            el: '#app',
            data: {
                cart: JSON.parse(localStorage.getItem('cart')) || [],
                mensaje: ""
            },
            methods: {
                removeFromCart(product) {
                    this.cart = this.cart.filter(item => item.id !== product.id);
                    this.updateCart();
                },
                increaseQuantity(product) {
                    product.cantidad++;
                    this.updateCart();
                },
                decreaseQuantity(product) {
                    if (product.cantidad > 1) {
                        product.cantidad--;
                        this.updateCart();
                    }
                },
                updateCart() {
                    localStorage.setItem('cart', JSON.stringify(this.cart));
                    // Actualiza el mensaje con los productos en el carrito
                    this.mensaje = "¡Hola! Quisiera realizar un pedido con los siguientes productos:\n";
                    this.cart.forEach(product => {
                        this.mensaje += product.nombre + " - Cant: " + product.cantidad + " - Precio: $" + product.precio + "\n";
                    });
                    this.mensaje += "Total: $" + this.totalAmount + ". ¿Cómo puedo proceder?";
                },
                clearCart() {
                    this.cart = [];
                    this.updateCart();
                }
            },
            computed: {
                totalAmount() {
                    return this.cart.reduce((total, product) => {
                        return total + (product.precio * product.cantidad);
                    }, 0);
                },
                totalProducts() {
                    return this.cart.reduce((total, product) => {
                        return total + product.cantidad;
                    }, 0);
                }
            },
            created() {
                // Actualiza el mensaje al cargar la página
                this.updateCart();
            }
        });
    </script>
</body>

</html>
