<?php
include 'conec.php';
$sql = "SELECT * FROM productos";
$resultado = $conn->query($sql);

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
$conn->close();
?>
