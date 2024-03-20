<?php
require_once "config.php";
require_once "helpers.php";

$nombre = "";
$descripcion = "";
$precio = "";
$categoria_id = "";
$imagen = "";
$nombre_err = "";
$descripcion_err = "";
$precio_err = "";
$categoria_id_err = "";
$imagen_err = "";

if(isset($_POST["id"]) && !empty($_POST["id"])){
    $id = $_POST["id"];

    $nombre = trim($_POST["nombre"]);
    $descripcion = trim($_POST["descripcion"]);
    $precio = trim($_POST["precio"]);
    $categoria_id = trim($_POST["categoria_id"]);

    if(isset($_FILES["imagenes"]) && !empty($_FILES["imagenes"]["name"][0])) {
        $uploadOk = 1;

        $targetDirectory = "../img/p$product_id/";

        if (!file_exists($targetDirectory)) {
            mkdir($targetDirectory, 0777, true);
        }

        for($i = 0; $i < count($_FILES["imagenes"]["name"]); $i++) {
            $filename = $_FILES["imagenes"]["name"][$i];
            $targetFile = $targetDirectory . $filename;

            $counter = 1;
            while(file_exists($targetFile)) {
                $filename = $counter . ".webp";
                $targetFile = $targetDirectory . $filename;
                $counter++;
            }

            if (move_uploaded_file($_FILES["imagenes"]["tmp_name"][$i], $targetFile)) {
                $image_path = "img/p$product_id/" . $filename;
                try {
                    $pdo = new PDO($dsn, $db_user, $db_password, $options);
                    $stmt_update_image = $pdo->prepare("UPDATE productos SET imagen = ? WHERE id = ?");
                    $stmt_update_image->execute([$image_path, $product_id]);
                } catch (PDOException $e) {
                    echo "Error: " . $e->getMessage();
                }
            } else {
                $imagen_err = "Hubo un error al subir el archivo " . basename($_FILES["imagenes"]["name"][$i]) . ".";
                $uploadOk = 0;
            }
        }
    }

    try {
        $dsn = "mysql:host=$db_server;dbname=$db_name;charset=utf8mb4";
        $pdo = new PDO($dsn, $db_user, $db_password, $options);
        $vars = parse_columns('productos', $_POST);
        $stmt = $pdo->prepare("UPDATE productos SET nombre=?,descripcion=?,precio=?,categoria_id=?,imagen=? WHERE id=?");

        if(!$stmt->execute([$nombre, $descripcion, $precio, $categoria_id, $imagen, $id])) {
            echo "Something went wrong. Please try again later.";
            header("location: error.php");
        } else {
            $stmt = null;
            header("location: productos-read.php?id=$id");
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
} else {
    $_GET["id"] = trim($_GET["id"]);
    if(isset($_GET["id"]) && !empty($_GET["id"])){
        $id =  trim($_GET["id"]);

        $sql = "SELECT * FROM productos WHERE id = ?";
        if($stmt = mysqli_prepare($link, $sql)){
            $param_id = $id;

            if (is_int($param_id)) $__vartype = "i";
            elseif (is_string($param_id)) $__vartype = "s";
            elseif (is_numeric($param_id)) $__vartype = "d";
            mysqli_stmt_bind_param($stmt, $__vartype, $param_id);

            if(mysqli_stmt_execute($stmt)){
                $result = mysqli_stmt_get_result($stmt);

                if(mysqli_num_rows($result) == 1){
                    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

                    $nombre = $row["nombre"];
                    $descripcion = $row["descripcion"];
                    $precio = $row["precio"];
                    $categoria_id = $row["categoria_id"];
                    $imagen = $row["imagen"];

                } else{
                    header("location: error.php");
                    exit();
                }

            } else{
                echo "Oops! Something went wrong. Please try again later.<br>".$stmt->error;
            }
        }

        mysqli_stmt_close($stmt);

    }  else{
        header("location: error.php");
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Update Record</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
</head>
<body>
    <section class="pt-5">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6 mx-auto">
                    <div class="page-header">
                        <h2>Update Record</h2>
                    </div>
                    <p>Please edit the input values and submit to update the record.</p>
                    <form action="<?php echo htmlspecialchars(basename($_SERVER['REQUEST_URI'])); ?>" method="post">

                        <div class="form-group">
                                <label>nombre</label>
                                <input type="text" name="nombre" maxlength="100"class="form-control" value="<?php echo $nombre; ?>">
                                <span class="form-text"><?php echo $nombre_err; ?></span>
                            </div>
						<div class="form-group">
                                <label>descripcion</label>
                                <textarea name="descripcion" class="form-control"><?php echo $descripcion ; ?></textarea>
                                <span class="form-text"><?php echo $descripcion_err; ?></span>
                            </div>
						<div class="form-group">
                                <label>precio</label>
                                <input type="text" name="precio" class="form-control" value="<?php echo $precio; ?>">
                                <span class="form-text"><?php echo $precio_err; ?></span>
                            </div>
                            <div class="form-group">
                                <label>categoria</label>
                                <select class="form-control" id="categoria_id" name="categoria_id">
                                    <?php
                                        $sql = "SELECT id, nombre FROM categorias"; // Modificado para seleccionar solo id y nombre
                                        $result = mysqli_query($link, $sql);
                                        while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                                            $categoria_id = $row['id']; // ID de la categoría
                                            $nombre_categoria = $row['nombre']; // Nombre de la categoría
                                            if ($categoria_id == $categoria_id_selected) {
                                                echo '<option value="' . $categoria_id . '" selected>' . $nombre_categoria . '</option>';
                                            } else {
                                                echo '<option value="' . $categoria_id . '">' . $nombre_categoria . '</option>';
                                            }
                                        }
                                    ?>
                                </select>
                                <span class="form-text"><?php echo $categoria_id_err; ?></span>
                            </div>


                            <div class="form-group">
                                <label>imagen</label>
                                <input name="imagenes[]" type="file" class="form-control" multiple>
                                <span class="form-text"><?php echo $imagen_err; ?></span>
                            </div>

                        <input type="hidden" name="id" value="<?php echo $id; ?>"/>
                        <input type="submit" class="btn btn-primary" value="Submit">
                        <a href="productos-index.php" class="btn btn-secondary">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </section>
</body>
</html>