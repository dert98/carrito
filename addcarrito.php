<?php
session_start();

// Recibe los datos del carrito enviados desde Vue.js
$data = json_decode(file_get_contents("php://input"), true);

// Guarda el carrito en la sesión
var_dump ($_SESSION['cart'] );
$_SESSION['cart'] = $data['cart'];

// Devuelve una respuesta exitosa si se guardó correctamente
echo json_encode(['success' => true]);
?>
