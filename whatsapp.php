<?php
session_start();

// Función para formatear el detalle del carrito como texto
function formatCart($cart) {
    $message = "Detalles del Carrito:\n";
    foreach ($cart as $item) {
        $message .= "Producto: " . $item['nombre'] . "\n";
        $message .= "Precio: $" . $item['precio'] . "\n";
        $message .= "Cantidad: " . $item['cantidad'] . "\n";
        $message .= "---------------------\n";
    }
    return $message;
}

// Verifica si $_SESSION['cart'] está definida y no es null
if (isset($_SESSION['cart'])) {
    // Obtiene los datos del carrito almacenados en la sesión
    $cart = $_SESSION['cart'];
    // Formatea el detalle del carrito como texto
    $cartMessage = formatCart($cart);
    // Codifica el mensaje para que sea parte del enlace
    $encodedMessage = urlencode($cartMessage);
    // Construye el enlace de WhatsApp con el detalle del carrito en el cuerpo del mensaje
    $whatsappLink = "whatsapp://send?text=" . $encodedMessage;
    // Redirige al enlace de WhatsApp
    header("Location: $whatsappLink");
    exit; // Detiene la ejecución del script después de redirigir
} else {
    // Si no hay datos en el carrito, redirige a una página de error o muestra un mensaje de error
    echo "El carrito está vacío.";
}
?>
