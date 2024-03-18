<?php
function generarSliderImagenes($directorio) {
    // Escanea el directorio y obtiene la lista de archivos
    $archivos = scandir($directorio);

    // Filtra los archivos para excluir "." y ".."
    $archivos = array_diff($archivos, array('.', '..'));
    
    // Inicializa el resultado del slider
    $sliderHTML = '';

    // Itera sobre la lista de archivos
    foreach($archivos as $key => $archivo) {
        // Comprueba si el archivo es una imagen
        $extensiones_permitidas = array('jpg', 'jpeg', 'png', 'gif', 'webp');
        $extension = pathinfo($archivo, PATHINFO_EXTENSION);
        if(in_array($extension, $extensiones_permitidas)) {
            // Genera el código HTML para cada imagen
            $active = ($key === 0) ? 'active' : '';
            $sliderHTML .= '<div class="carousel-item ' . $active . '">';
            $sliderHTML .= '<img src="' . $directorio . $archivo . '" class="d-block w-75" alt="Slide ' . ($key + 1) . '">';
            $sliderHTML .= '</div>';
        }
    }

    return $sliderHTML;
}

// Verificar si se recibió el parámetro id
if(isset($_GET["id"]) && !empty($_GET["id"])){
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
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="UTF-8">
    <title>Detalle de producto</title>
    <link rel="stylesheet" href="public/css/styles.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="page-header text-center mt-3">
                    <h1>Detalle de producto</h1>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                        <?php echo generarSliderImagenes("img/p1/"); ?>
                    </div>
                    <!-- Controles del slider -->
                    <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>
            <div class="col-md-6">
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


    <br>
    <h1>Slider #1</h1>
  <div class="carrusel">
    <ul class="carrusel-fotos">
    <li id="foto1"><img class="" style="height: 400; width: 300 " src="img/p<?php echo $row["id"]; ?>./1.webp" alt=""></li>
    <li id="foto1"><img class="" style="height: 400; width: 300 " src="img/p<?php echo $row["id"]; ?>./2.webp" alt=""></li>

    </ul>
    <ul class="carrusel-menu">
    <li id="foto1"><img class="" style="height: 400; width: 300 " src="img/p<?php echo $row["id"]; ?>./1.webp" alt=""></li>
    <li id="foto1"><img class="" style="height: 400; width: 300 " src="img/p<?php echo $row["id"]; ?>./2.webp" alt=""></li>
 
    </ul>
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
