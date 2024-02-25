<?php
class Producto {
    private $conn;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function obtenerProductosPorCategoria($categoria_id) {
        $sql = "SELECT * FROM productos WHERE categoria_id = $categoria_id";
        $result = $this->conn->query($sql);
        $productos = [];
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $productos[] = $row;
            }
        }
        return $productos;
    }

    public function nombreCategoria($categoria_id) {
        // Consulta SQL para obtener el nombre de la categoría
        $sql = "SELECT nombre FROM categorias WHERE id = $categoria_id";

        // Ejecutar la consulta
        $result = $this->conn->query($sql);

        // Verificar si se encontró la categoría
        if ($result->num_rows > 0) {
            // Obtener el nombre de la categoría
            $row = $result->fetch_assoc();
            return $row['nombre'];
        } else {
            return "Categoría no encontrada";
        }
    }
}
?>
