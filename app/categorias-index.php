<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Panel de control</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/6b773fe9e4.js" crossorigin="anonymous"></script>
    <style type="text/css">
        .page-header h2{
            margin-top: 0;
        }
        table tr td:last-child a{
            margin-right: 5px;
        }
        body {
            font-size: 14px;
        }
    </style>
</head>
<body>
    <section class="pt-5">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header clearfix">
                        <h2 class="float-left">Detalles de categorías</h2>
                        <a href="categorias-create.php" class="btn btn-success float-right">Agregar nuevo registro</a>
                        <a href="categorias-index.php" class="btn btn-info float-right mr-2">Restablecer vista</a>
                        <a href="index.php" class="btn btn-secondary float-right mr-2">Volver</a>
                    </div>

                    <div class="form-row">
                        <form action="categorias-index.php" method="get">
                        <div class="col">
                          <input type="text" class="form-control" placeholder="Buscar en esta tabla" name="search">
                        </div>
                    </div>
                        </form>
                    <br>

                    <?php
                    // Incluir archivo de configuración
                    require_once "config.php";
                    require_once "helpers.php";

                    // Obtener la URL actual y los parámetros para la paginación correcta
                    $protocolo = $_SERVER['SERVER_PROTOCOL'];
                    $dominio = $_SERVER['HTTP_HOST'];
                    $script = $_SERVER['SCRIPT_NAME'];
                    $parametros = $_SERVER['QUERY_STRING'];
                    $protocolo = strpos(strtolower($_SERVER['SERVER_PROTOCOL']), 'https') === FALSE ? 'http' : 'https';
                    $url_actual = $protocolo . '://' . $dominio . $script . '?' . $parametros;

                    // Paginación
                    if (isset($_GET['pageno'])) {
                        $pageno = $_GET['pageno'];
                    } else {
                        $pageno = 1;
                    }

                    //$no_of_records_per_page se establece en la página de índice. El valor predeterminado es 10.
                    $offset = ($pageno-1) * $no_of_records_per_page;

                    $total_pages_sql = "SELECT COUNT(*) FROM categorias";
                    $result = mysqli_query($link,$total_pages_sql);
                    $total_rows = mysqli_fetch_array($result)[0];
                    $total_pages = ceil($total_rows / $no_of_records_per_page);

                    // Ordenamiento de columnas por nombre de columna
                    $orderBy = array('id', 'nombre');
                    $order = 'id';
                    if (isset($_GET['order']) && in_array($_GET['order'], $orderBy)) {
                            $order = $_GET['order'];
                        }

                    // Orden de clasificación de columnas
                    $sortBy = array('asc', 'desc'); $sort = 'desc';
                    if (isset($_GET['sort']) && in_array($_GET['sort'], $sortBy)) {
                          if($_GET['sort']=='asc') {
                            $sort='desc';
                            }
                    else {
                        $sort='asc';
                        }
                    }

                    // Intento de ejecución de consulta de selección
                    $sql = "SELECT * FROM categorias ORDER BY $order $sort LIMIT $offset, $no_of_records_per_page";
                    $count_pages = "SELECT * FROM categorias";


                    if(!empty($_GET['search'])) {
                        $search = ($_GET['search']);
                        $sql = "SELECT * FROM categorias
                            WHERE CONCAT_WS (id,nombre)
                            LIKE '%$search%'
                            ORDER BY $order $sort
                            LIMIT $offset, $no_of_records_per_page";
                        $count_pages = "SELECT * FROM categorias
                            WHERE CONCAT_WS (id,nombre)
                            LIKE '%$search%'
                            ORDER BY $order $sort";
                    }
                    else {
                        $search = "";
                    }

                    if($result = mysqli_query($link, $sql)){
                        if(mysqli_num_rows($result) > 0){
                            if ($result_count = mysqli_query($link, $count_pages)) {
                               $total_pages = ceil(mysqli_num_rows($result_count) / $no_of_records_per_page);
                           }
                            $number_of_results = mysqli_num_rows($result_count);
                            echo " " . $number_of_results . " resultados - Página " . $pageno . " de " . $total_pages;

                            echo "<table class='table table-bordered table-striped'>";
                                echo "<thead>";
                                    echo "<tr>";
                                        echo "<th><a href=?search=$search&sort=&order=id&sort=$sort>id</th>";
										echo "<th><a href=?search=$search&sort=&order=nombre&sort=$sort>nombre</th>";
										
                                        echo "<th>Acción</th>";
                                    echo "</tr>";
                                echo "</thead>";
                                echo "<tbody>";
                                while($row = mysqli_fetch_array($result)){
                                    echo "<tr>";
                                    echo "<td>" . $row['id'] . "</td>";echo "<td>" . $row['nombre'] . "</td>";
                                        echo "<td>";
                                            echo "<a href='categorias-read.php?id=". $row['id'] ."' title='Ver registro' data-toggle='tooltip'><i class='far fa-eye'></i></a>";
                                            echo "<a href='categorias-update.php?id=". $row['id'] ."' title='Actualizar registro' data-toggle='tooltip'><i class='far fa-edit'></i></a>";
                                            echo "<a href='categorias-delete.php?id=". $row['id'] ."' title='Eliminar registro' data-toggle='tooltip'><i class='far fa-trash-alt'></i></a>";
                                        echo "</td>";
                                    echo "</tr>";
                                }
                                echo "</tbody>";
                            echo "</table>";
?>
                                <ul class="pagination" align-right>
                                <?php
                                    $new_url = preg_replace('/&?pageno=[^&]*/', '', $url_actual);
                                 ?>
                                    <li class="page-item"><a class="page-link" href="<?php echo $new_url .'&pageno=1' ?>">Primera</a></li>
                                    <li class="page-item <?php if($pageno <= 1){ echo 'disabled'; } ?>">
                                        <a class="page-link" href="<?php if($pageno <= 1){ echo '#'; } else { echo $new_url ."&pageno=".($pageno - 1); } ?>">Anterior</a>
                                    </li>
                                    <li class="page-item <?php if($pageno >= $total_pages){ echo 'disabled'; } ?>">
                                        <a class="page-link" href="<?php if($pageno >= $total_pages){ echo '#'; } else { echo $new_url . "&pageno=".($pageno + 1); } ?>">Siguiente</a>
                                    </li>
                                    <li class="page-item <?php if($pageno >= $total_pages){ echo 'disabled'; } ?>">
                                        <a class="page-item"><a class="page-link" href="<?php echo $new_url .'&pageno=' . $total_pages; ?>">Última</a>
                                    </li>
                                </ul>
<?php
                            // Liberar conjunto de resultados
                            mysqli_free_result($result);
                        } else{
                            echo "<p class='lead'><em>No se encontraron registros.</em></p>";
                        }
                    } else{
                        echo "ERROR: No se pudo ejecutar $sql. " . mysqli_error($link);
                    }

                    // Cerrar conexión
                    mysqli_close($link);
                    ?>
                </div>
            </div>
        </div>
    </section>
<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            $('[data-toggle="tooltip"]').tooltip();
        });
    </script>
</body>
</html>