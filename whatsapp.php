<?php
// Función para enviar un mensaje de WhatsApp
function enviarMensajeWhatsApp($mensaje) {
    $telefonoDestino = "+542213124839"; // Número de teléfono del destinatario
    $texto = urlencode($mensaje); // Codificar el mensaje para su uso en la URL

    // Configuración de la API de WhatsApp Business
    $token = "TU_TOKEN_DE_ACCESO"; // Token de acceso de la API
    $url = "https://api.whatsapp.com/send?phone={$telefonoDestino}&text={$texto}&app_absent=0&token={$token}";

    // Redirigir al enlace para enviar el mensaje a través de WhatsApp
    header("Location: {$url}");
    exit;
}

// Ejemplo de datos del carrito
$carrito = [
    ["nombre" => "Producto 1", "precio" => 10, "cantidad" => 2],
    ["nombre" => "Producto 2", "precio" => 15, "cantidad" => 1],
    // Agregar más productos según sea necesario
];

// Preparar el mensaje con los detalles del carrito
$mensaje = "Detalles del carrito:\n";
foreach ($carrito as $producto) {
    $mensaje .= "{$producto['nombre']}: {$producto['cantidad']} x {$producto['precio']} = " . ($producto['cantidad'] * $producto['precio']) . "\n";
}
$mensaje .= "Total: " . array_reduce($carrito, function ($total, $producto) {
    return $total + ($producto['cantidad'] * $producto['precio']);
}, 0);

// Enviar el mensaje de WhatsApp
enviarMensajeWhatsApp($mensaje);
?>
