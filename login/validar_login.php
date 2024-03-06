<?php
require_once 'conexion.php';

// Iniciar sesión si aún no está iniciada
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtener el nombre de usuario y la contraseña del formulario
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Consulta SQL para verificar si el usuario y la contraseña son válidos
    $consulta = "SELECT * FROM usuarios WHERE username = :username AND password = :password";
    $stmt = $pdo->prepare($consulta);
    $stmt->execute(['username' => $username, 'password' => $password]);
    $usuario = $stmt->fetch();

    // Si se encuentra el usuario, establecer la variable de sesión y redireccionar a la página de inicio de sesión exitoso
    if ($usuario) {
        session_start();
        $_SESSION['usuario'] = $usuario['username'];
        header('Location: /carrito');
        exit;
    } else {
        $mensaje_error = 'Usuario o contraseña incorrectos';
        header('Location: /carrito/login/login.php');
        exit;
    }
}
?>
