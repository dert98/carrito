<?php
include 'conec.php'; // Incluir el archivo de conexión

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recuperar los datos del formulario
    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];
    $precio = $_POST['precio'];
    $categoria_id = $_POST['categoria_id']; // Suponiendo que tienes un campo para la categoría

    // Preparar la consulta SQL para insertar un nuevo producto
    $sql = "INSERT INTO productos (nombre, descripcion, precio, categoria_id) VALUES ('$nombre', '$descripcion', $precio, $categoria_id)";

    // Ejecutar la consulta
    if ($conn->query($sql) === TRUE) {
        echo "Nuevo producto creado correctamente";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>
