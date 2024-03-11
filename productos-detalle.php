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
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
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
