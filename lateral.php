<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <nav class="navbar h-100 w-50 navbar-expand-md navbar-dark bg-dark flex-md-column flex-row align-items-start">
        <!-- Botón de hamburguesa para dispositivos pequeños -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#sidebar">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Contenido de la barra lateral -->
        <div class="collapse navbar-collapse" id="sidebar">
            <ul class="navbar-nav flex-column">
                <!-- Iterar sobre todas las categorías y mostrarlas como elementos de menú -->
                <?php
                include 'conec.php'; // Incluir el archivo de conexión a la base de datos
                $sql = "SELECT * FROM categorias";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo '<li class="nav-item"><a class="nav-link" href="/carrito/?categoria_id='.$row["id"].'">'.$row["nombre"].'</a></li>';
                    }
                } else {
                    echo "0 resultados";
                }
                ?>
            </ul>
        </div>
    </nav>
</body>
</html>