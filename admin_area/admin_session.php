<!-- Including the database connection file -->
<?php include("../connection.php"); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="El Pastelito Barcelona. Reposteria Online Creativa y Personalizada.">
    <meta name="author" content="@El Pastelito">
    <!-- Bootstrap Style -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
        integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <title>Admin Area. Listado Categorias y Productos</title>
</head>

<body>
    <!-- Button Logout -->
    <div>
        <a class="btn btn-info mx-5 my-3" href="../logout.php">Logout</a>
    </div>

    <!-- Admin options to edit product categories  -->
    <!-- Title Category -->
    <div class="jumbotron text-center p-3 my-3 mx-5 border">
        <h2 class="text-info">Listado Categorias</h2>
    </div>


    <!-- The button connects with the form to create a new category-->
    <form role="form" method="post" action="admin_category.php">
        <input name="action" type="hidden" value="New">
        <button name="id" type="submit" class="btn btn-info mx-5 mb-4">Nueva Categoria</button>
    </form>
    <?php

    //Connect with database category table
    $result =mysqli_query($mysqli, " SELECT*FROM CATEGORIAS; ");
    //Error control
    if(!$result){
        echo "Error query:" . mysqli_error($mysqli);
    }else{?>
    <table class="table-responsive-sm table-info d-flex align-content-start my-2 mx-5">
        <tr>
            <td class="p-3 border" width="150">ID Categoria</td>
            <td class="p-3 border" width="300">Nombre</td>
        </tr>
    </table>
    <?php
// Browse and Show the category records
  while($row=$result->fetch_assoc()){?>
    <table>
        <tr>
            <td>
                <table class="table-responsive-sm d-flex justify-content-around my-2 pl-5 pr-2">
                    <tr>
                        <td class="p-2 border" width="150"><?php echo $row["ID_CATEGORIA"]?></td>
                        <td class="p-2 border" width="300"><?php echo $row["NOMBRE"]?></td>
                    </tr>
                </table>
            <td>
                <!-- The button connects with the form_product.php to modify a category information-->
                <form method="post" action="admin_category.php">
                    <input name="id" type="hidden" value="<?php echo $row ['ID_CATEGORIA']?>">
                    <button name="action" value="Modify" type="submit" class="btn btn-info my-1">Modificar </button>
                </form>
            </td>
            <!-- The button connects with the form_product.php to delete a category -->
            <td>
                <form method="post" action="admin_category.php">
                    <input name="id" type="hidden" value="<?php echo $row ['ID_CATEGORIA']?>">
                    <button name="action" value="Delete" type="submit" class="btn btn-info my-1 mx-1">Borrar</button>
                </form>
            </td>
        </tr>
    </table>
    <?php
  }
}     
?>
    <!------------------------------------------------------------------------------
        Admin options to edit Products List  -->
    <!-- Title  Products-->
    <div class="jumbotron text-center p-3 my-3 mx-5 border">
        <h2 class="text-info">Listado Productos</h2>
    </div>

    <!-- The button connects with the form to create a new product.-->
    <form role="form" method="post" action="admin_products.php">
        <input type="hidden" name="action" value="New">
        <button name="id" type="submit" class="btn btn-info mx-5 mb-4">Nuevo Producto</button>
    </form>

    <?php
    //Connect with database PRODUCTOS table
    $result =mysqli_query($mysqli, " SELECT*FROM PRODUCTOS; ");
    //Error control
    if(!$result){
        echo "Error query:" . mysqli_error($mysqli);
    }else{?>
    <table class="table-responsive-sm table-info d-flex align-content-start my-2 mx-5">
        <tr>
            <td class="p-3 border" width="200">Nombre</td>
            <td class="p-3 border" width="200">Descripción</td>
            <td class="p-3 border" width="200">Precio</td>
            <td class="p-3 border" width="200">Foto</td>
            <td class="p-3 border" width="150">Categoria Producto</td>
        </tr>
    </table>
    <?php
// Browse and Show the products records
  while($row=$result->fetch_assoc()){?>
    <table>
        <tr>
            <td>
                <table class="table-responsive-sm d-flex justify-content-around my-2 pl-5 pr-2">
                    <tr>
                        <td class="p-2 border" width="200"><?php echo $row["NOMBRE"]?></td>
                        <td class="p-2 border" width="200"><?php echo $row["DESCRIPCION"]?></td>
                        <td class="p-2 border" width="200"><?php echo $row["PRECIO"]?></td>
                        <td class="p-2 border" width="200"><?php echo $row["URL_FOTO"]?></td>
                        <td class="p-2 border" width="150"><?php echo $row["CATEGORIA_ID"]?></td>
                    </tr>
                </table>
            <td>
                <!-- The button connects with the admin_products.php to modify a product information-->
                <form method="post" action="admin_products.php">
                    <input name="id" type="hidden" value="<?php echo $row ['ID_PRODUCTO']?>">
                    <button name="action" value="Modify" type="submit" class="btn btn-info my-1">Modificar </button>
                </form>
            </td>
            <!-- The button connects with the admin_products.php to delete a product -->
            <td>
                <form method="post" action="admin_products.php">
                    <input name="id" type="hidden" value="<?php echo $row ['ID_PRODUCTO']?>">
                    <button name="action" value="Delete" type="submit" class="btn btn-info my-1 mx-1">Borrar</button>
                </form>
            </td>
        </tr>
    </table>
    <?php
  }
}      
?>

   



    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js "
        integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN " crossorigin="anonymous ">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js "
        integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV " crossorigin="anonymous ">
    </script>
</body>

</html>