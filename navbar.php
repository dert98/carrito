<!DOCTYPE html>
<html lang="en">
<?php
    session_start();
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Navbar con Vue.js</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"
        integrity="sha512-TDt63en8mH1HwE+YQqO85A5+I9T44TbOq3q2X/fxT0fGJR7qjvc3+RzxdBEdDKhhwKZChBw2hxJ00hafXBiBjA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        /* Estilos específicos para el navbar horizontal personalizado */
        .navbar-horizontal-custom {
            background-color: #343a40;
            /* Color de fondo */
            color: #ffffff;
            /* Color del texto */
            padding: 10px;
            /* Espaciado interno */
        }

        /* Estilos para los elementos del navbar horizontal personalizado */
        .navbar-horizontal-custom .nav-item {
            margin-right: 10px;
            /* Espaciado entre elementos */
        }

        .navbar-horizontal-custom .nav-link {
            color: #ffffff;
            /* Color del texto */
            text-decoration: none;
            /* Sin subrayado */
            transition: all 0.3s ease;
            /* Transición suave */
        }

        .navbar-horizontal-custom .nav-link:hover {
            color: #ffc107;
            /* Cambio de color del texto al pasar el mouse */
        }
    </style>
</head>

<body>
    <div id="navbarApp">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark navbar-horizontal-custom">
            <div class="container">
                <!-- Centra el contenido dentro del contenedor -->
                <div class="mx-auto">
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false"
                        aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link" href="/">
                                    <i class="fas fa-home"></i> Inicio
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="carrito.php">
                                    <i class="fas fa-shopping-cart"></i> Carrito
                                    <span v-if="cart.length > 0">({{ cantidadProductos }})</span>
                                </a>
                            </li>
                            <!-- Bloque de código PHP para mostrar el nombre de usuario y el enlace para cerrar sesión -->
                            <?php
                            $nombreUsuario = isset($_SESSION['usuario']) ? $_SESSION['usuario'] : 'Bienvenido';
                            if (isset($_SESSION['usuario'])) {
                                echo '<li class="nav-item">
                                          <a class="nav-link" href="/carrito/app">&nbsp;' . $_SESSION['usuario'] . '&nbsp;</a>
                                      </li>';
                                echo '<li class="nav-item">
                                          <a class="nav-link" href="login/cerrar_sesion.php" title="Cerrar Sesión"><i class="fas fa-user" alt="Usuario"></i>Cerrar Sesión</a>
                                      </li>';                            
                            } else {
                                echo '<li class="nav-item">
                                <a class="nav-link" href="login/login.php"><i class="fas fa-user"></i>Iniciar Sesión</a>
                            </li>';
                            }
                            ?>
                        </ul>
                    </div>
                </div>
            </div>
        </nav>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/vue@2"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script>
        // Instancia de Vue para el componente del navbar
        new Vue({
            el: '#navbarApp',
            data: {
                cart: JSON.parse(localStorage.getItem('cart')) || [],
                nombreUsuario: '<?php echo $nombreUsuario; ?>'
            },
            computed: {
                totalProducts() {
                    return this.cart.reduce((total, product) => {
                        return total + product.cantidad;
                    }, 0);
                }
            },
        });

        // Función para recargar la página
        function reloadPage() {
            location.reload();
        }
    </script>

    <?php
    // Si se ha enviado un formulario para agregar un producto al carrito, recarga la página
    if (isset($_POST['agregar_al_carrito'])) {
        echo '<script>reloadPage();</script>';
    }
    ?>
</body>

</html>
