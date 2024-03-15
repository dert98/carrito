<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-TDt63en8mH1HwE+YQqO85A5+I9T44TbOq3q2X/fxT0fGJR7qjvc3+RzxdBEdDKhhwKZChBw2hxJ00hafXBiBjA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

<style>
    /* Estilos específicos para el navbar horizontal personalizado */
    .navbar-horizontal-custom {
        background-color: #343a40; /* Color de fondo */
        color: #ffffff; /* Color del texto */
        padding: 10px; /* Espaciado interno */
    }

    /* Estilos para los elementos del navbar horizontal personalizado */
    .navbar-horizontal-custom .nav-item {
        margin-right: 10px; /* Espaciado entre elementos */
    }

    .navbar-horizontal-custom .nav-link {
        color: #ffffff; /* Color del texto */
        text-decoration: none; /* Sin subrayado */
        transition: all 0.3s ease; /* Transición suave */
    }

    .navbar-horizontal-custom .nav-link:hover {
        color: #ffc107; /* Cambio de color del texto al pasar el mouse */
    }
</style>

<?php
// Inicia la sesión
session_start();

// Verifica si $_SESSION['usuario'] está definido y no es nulo
$nombreUsuario = isset($_SESSION['usuario']) ? $_SESSION['usuario'] : 'Bienvenido';
?>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark navbar-horizontal-custom">
    <div class="container">
        <!-- Centra el contenido dentro del contenedor -->
        <div class="mx-auto">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="/carrito">
                            <i class="fas fa-home"></i> Inicio
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="carrito.php">
                            <i class="fas fa-shopping-cart"></i> Carrito
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <i class="fas fa-user"></i> <?php echo $nombreUsuario; ?>
                        </a>
                    </li>
                    <!-- Bloque de código PHP para mostrar el nombre de usuario y el enlace para cerrar sesión -->
                    <?php
                    if (isset($_SESSION['usuario'])) {
                        echo '<li class="nav-item">
                                <a class="nav-link" href="login/cerrar_sesion.php">Cerrar Sesión</a>
                            </li>';
                    } else {
                        echo '<li class="nav-item">
                                <a class="nav-link" href="login/login.php">Iniciar Sesión</a>
                            </li>';
                    }
                    ?>
                </ul>
            </div>
        </div>
    </div>
</nav>

