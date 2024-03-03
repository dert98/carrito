<?php
session_start();
$tipe = $_GET['tipe'] ? $_GET['tipe'] : 'add';
if($tipe == 'add'){
    // Recibe los datos del carrito enviados desde Vue.js
    $data = json_decode(file_get_contents("php://input"), true);

    if($data != null){
        // Guarda el carrito en la sesión
        echo json_encode($data['cart']);
        $_SESSION['cart'] = $data['cart'];

        // Devuelve una respuesta exitosa si se guardó correctamente
        echo json_encode(['success' => true]);
    } else{
        echo "sin datos";
    }
} else{
    echo json_encode($_SESSION['cart']);
}

?>
