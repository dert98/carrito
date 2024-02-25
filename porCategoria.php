<?php
include 'modelo_productos.php';
include 'conec.php';

$productoModelo = new Producto($conn);
if(isset($_GET['categoria_id'])) {
    $categoria_id = $_GET['categoria_id'];
    $productos = $productoModelo->obtenerProductosPorCategoria($categoria_id);
    // Llamar a la vista para mostrar los productos
    $categoria_id = $_GET['categoria_id'];
    $nombre_categoria = $productoModelo->nombreCategoria($categoria_id);
}
include 'vista_productos.php';
?>