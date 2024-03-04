<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-TDt63en8mH1HwE+YQqO85A5+I9T44TbOq3q2X/fxT0fGJR7qjvc3+RzxdBEdDKhhwKZChBw2hxJ00hafXBiBjA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

<?php
// Inicia la sesión
session_start();

// Verifica si $_SESSION['usuario'] está definido y no es nulo
$nombreUsuario = isset($_SESSION['usuario']) ? $_SESSION['usuario'] : 'bienvenido';
?>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container justify-content-center">
        <a class="navbar-brand" href="#">Tienda</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="#">Ofertas</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Contactos</a>
                </li>
                <?php
                    if (isset($_SESSION['usuario'])) {
                        echo '<span class="navbar-text">';
                        echo $_SESSION['usuario'];
                        echo '</span>';
                        echo '<li class="nav-item">
                                <a class="nav-link" href="login/cerrar_sesion.php">Cerrar Sesion</a>
                            </li>';
                    }else{
                        echo '<li class="nav-item">
                                <a class="nav-link" href="login/login.php">Iniciar</a>
                            </li>';
                    }
                    ?>

            </ul>
        </div>
    </div>
</nav>


<style>
    .navbar-nav .nav-link {
        transition: color 0.3s ease;
    }

    .navbar-nav .nav-link:hover {
        color: #ffc107; /* Cambia el color al pasar el mouse */
    }
</style>
