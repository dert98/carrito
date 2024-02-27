<?php
<<<<<<< Updated upstream
// obtener_productos.php

// Incluir el archivo de conexión
require_once 'conec.php';

// Verificar si se recibió el parámetro "categoria_id" en la URL
if (isset($_GET['categoria_id']) && !empty($_GET['categoria_id'])) {
    // Obtener el ID de la categoría desde el parámetro
    $categoria_id = $_GET['categoria_id'];

    // Consulta SQL para obtener los productos de la categoría específica
    $sql = "SELECT * FROM productos WHERE categoria_id = $categoria_id";
} else {
    // Si no se proporciona un ID de categoría, obtener todos los productos
    $sql = "SELECT * FROM productos";
}
// Ejecutar la consulta
$resultado = mysqli_query($conn, $sql);

// Verificar si hay resultados
if (mysqli_num_rows($resultado) > 0) {
    // Inicializar un array para almacenar los productos
    $productos = array();

    // Recorrer los resultados y almacenarlos en el array de productos
    while ($fila = mysqli_fetch_assoc($resultado)) {
        $productos[] = $fila;
    }

    // Devolver los productos como JSON
    echo json_encode($productos);
} else {
    echo json_encode(array()); // Devolver un array vacío si no se encontraron productos
}

// Cerrar conexión
mysqli_close($conn);
=======
include 'conec.php';
$sql = "SELECT * FROM productos";
$resultado = $conexion->query($sql);

// Convertir los resultados a un array asociativo
$productos = array();
if ($resultado->num_rows > 0) {
    while ($fila = $resultado->fetch_assoc()) {
        $productos[] = $fila;
    }
}

// Devolver los datos como JSON
echo json_encode($productos);

// Cerrar la conexión
$conexion->close();
>>>>>>> Stashed changes
?>
