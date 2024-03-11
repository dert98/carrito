<?php
// Verificar si se recibió el parámetro id
if(isset($_GET["id"]) && !empty($_GET["id"])){
    // Incluir el archivo de configuración
    try {
        // Crear una conexión PDO
        $pdo = new PDO("mysql:host=localhost;dbname=web", 'root', '');
        // Configurar el modo de error para que lance excepciones
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        // Preparar una declaración SQL para seleccionar el producto por su id
        $stmt = $pdo->prepare("SELECT * FROM productos WHERE id = ?");
        // Ejecutar la declaración con el id recibido
        $stmt->execute([$_GET["id"]]);
        
        // Obtener el resultado como un array asociativo
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        
        // Verificar si se encontró el producto
        if($row) {
            // Mostrar el HTML con los detalles del producto y el slider
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Detalle de producto</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
</head>
<body>
    <section class="pt-5">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-8 mx-auto">
                    <div class="page-header">
                        <h1>Detalle de producto</h1>
                    </div>

                    <div class="form-group">
                        <b><label>Nombre</label></b>
                        <p class="form-control-static"><?php echo $row["nombre"]; ?></p>
                    </div>
                    <div class="form-group">
                        <b><label>Descripcion</label></b>
                        <p class="form-control-static"><?php echo $row["descripcion"]; ?></p>
                    </div>
                    <div class="form-group">
                        <b><label>Precio</label></b>
                        <p class="form-control-static"><?php echo $row["precio"]; ?></p>
                    </div>
                    <div class="form-group">
                        <b><label>Categoria</label></b>
                        <p class="form-control-static"><?php echo $row["categoria_id"]; ?></p>
                    </div>
                    <div class="form-group">
                        <b><label>Imagenes</label></b>
                        <p class="form-control-static"><?php echo $row["imagen"]; ?></p>
                    </div>

                    <p><a href="#" class="btn btn-primary">Atras</a></p>
                </div>
            </div>
        </div>
    </section>
    <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner" style="width: 200px; height: 200px;">
            <div class="carousel-item active">
                <img src="img/p1/1.webp" class="d-block w-100" alt="Slide 1">
            </div>
            <div class="carousel-item">
                <img src="img/p1/2.webp" class="d-block w-100" alt="Slide 2">
            </div>
            <div class="carousel-item">
                <img src="img/p1/3.webp" class="d-block w-100" alt="Slide 3">
            </div>
            <!-- Añade más imágenes según sea necesario -->
        </div>
        <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.12.1/dist/umd/popper.min.js" integrity="sha384-FZNtAtjJ8Sb4W+3G2GtFsJ/xXIVbpJ5rCVa+a7CLQ2Se+U3N2QNOZlsOw+2jnYlS" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</body>
</html>
<?php
            // Cerrar la conexión y la declaración
            unset($stmt);
            unset($pdo);
        } else {
            // Si no se encontró el producto, redirigir a la página de error
            header("location: error.php");
            exit();
        }
    } catch(PDOException $e) {
        // Manejar cualquier excepción de PDO
        echo "Oops! Something went wrong. Please try again later.<br>" . $e->getMessage();
    }
} else {
    // Si no se recibió el parámetro id, redirigir a la página de error
    header("location: error.php");
    exit();
}
?>
