<?php
// Process delete operation after confirmation
if(isset($_POST["id"]) && !empty($_POST["id"])){
    // Include config file
    require_once "config.php";
    require_once "helpers.php";

    // Prepare a delete statement for products associated with the category
    $sql_delete_products = "DELETE FROM productos WHERE categoria_id = ?";
    $stmt_delete_products = mysqli_prepare($link, $sql_delete_products);

    // Set parameter for the category ID
    $param_id = trim($_POST["id"]);
    mysqli_stmt_bind_param($stmt_delete_products, "i", $param_id);

    // Attempt to execute the prepared statement for deleting products
    if(mysqli_stmt_execute($stmt_delete_products)){
        // Close statement
        mysqli_stmt_close($stmt_delete_products);

        // Prepare a delete statement for the category
        $sql_delete_category = "DELETE FROM categorias WHERE id = ?";

        if($stmt_delete_category = mysqli_prepare($link, $sql_delete_category)){
            // Bind variable to the prepared statement as parameter
            mysqli_stmt_bind_param($stmt_delete_category, "i", $param_id);

            // Attempt to execute the prepared statement for deleting category
            if(mysqli_stmt_execute($stmt_delete_category)){
                // Records deleted successfully. Redirect to landing page
                header("location: categorias-index.php");
                exit();
            } else{
                echo "Oops! Something went wrong. Please try again later.<br>" . $stmt_delete_category->error;
            }
        }

        // Close statement
        mysqli_stmt_close($stmt_delete_category);
    } else {
        echo "Oops! Something went wrong. Please try again later.<br>" . $stmt_delete_products->error;
    }

    // Close connection
    mysqli_close($link);
} else {
    // Check existence of id parameter
    $_GET["id"] = trim($_GET["id"]);
    if(empty($_GET["id"])){
        // URL doesn't contain id parameter. Redirect to error page
        header("location: error.php");
        exit();
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>View Record</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
</head>
<body>
    <section class="pt-5">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6 mx-auto">
                    <div class="page-header">
                        <h1>Delete Record</h1>
                    </div>
                    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
                        <div class="alert alert-danger fade-in">
                            <input type="hidden" name="id" value="<?php echo trim($_GET["id"]); ?>"/>
                            <p>Are you sure you want to delete this record?</p><br>
                            <p>
                                <input type="submit" value="Yes" class="btn btn-danger">
                                <a href="categorias-index.php" class="btn btn-secondary">No</a>
                            </p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</body>
</html>
