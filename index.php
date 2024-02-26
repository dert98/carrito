<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://dert98.github.io/Porfolio/global.css">
    <script src="https://cdn.jsdelivr.net/npm/vue@2.6.14/dist/vue.js"></script>
</head>
<body>
    <div class="text-center bg2">
        <p class="bg1 p-2"><img style="width: 23px; margin-top: -5px; margin-right: 10px;" src="https://olivostore.pe/wp-content/uploads/2022/02/icon-gift.png">S/10.00 de descuento en tu primer pedido con el cupón OLIVO10</p>
        <label class="text-center p-2" for=""><img style="width: 23px; margin-top: -5px; margin-right: 10px;" src="https://olivostore.pe/wp-content/uploads/2022/02/icon-delivery.png">Delivery gratis a todo el Perú este mes</label>
    </div>
    <?php
        include 'conec.php';
        include 'slider.php';
        include 'navbar.php';
        include 'lateral.php';
        include 'footer.php';
    ?>
<a href="">
    <img src="img/wsp.png" alt="" class="whatsapp">
</a>
</div>
<script>
        new Vue({
            el: '#app',
            data: {
                products: [
                    { id: 1, name: 'Product 1', price: 10 },
                    { id: 2, name: 'Product 2', price: 20 },
                    { id: 3, name: 'Product 3', price: 30 }
                ],
                cart: []
            },
            methods: {
                addToCart(product) {
                    this.cart.push({ id: product.id, name: product.name, price: product.price });
                },
                removeFromCart(item) {
                    const index = this.cart.findIndex(i => i.id === item.id);
                    if (index !== -1) {
                        this.cart.splice(index, 1);
                    }
                }
            },
            computed: {
                total() {
                    return this.cart.reduce((acc, item) => acc + item.price, 0);
                }
            }
        });
    </script>
</body>
</html>