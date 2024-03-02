<?php
session_start();

// Recibe los datos del carrito enviados desde Vue.js
$data = json_decode(file_get_contents("php://input"), true);

// Verifica si $_SESSION['cart'] está definida y no es null
if (isset($_SESSION['cart'])) {
    // Si está definida, asigna los datos recibidos del carrito
    $_SESSION['cart'] = $data['cart'];
} else {
    // Si no está definida o es null, inicializa $_SESSION['cart'] con un array vacío
    $_SESSION['cart'] = [];
}

// Devuelve una respuesta exitosa si se guardó correctamente
echo json_encode(['success' => true]);
?>