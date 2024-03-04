<?php
// Configuración de la conexión a la base de datos
$dsn = 'mysql:host=localhost;dbname=web';
$usuario = 'root';
$contraseña = '';

// Intentar establecer la conexión
try {
    $pdo = new PDO($dsn, $usuario, $contraseña);
} catch (PDOException $e) {
    echo 'Error de conexión: ' . $e->getMessage();
    exit;
}
?>
