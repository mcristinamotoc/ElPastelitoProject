<!-- Including the Functions categories file -->
<?php include ("functions_products.php");?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap Style -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
        integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <title>ADMIN AREA</title>
</head>

<body>
    <!-- Title -->
    <div class="jumbotron text-center p-3 my-3 border">
        <h2 class="text-info">ADMIN AREA</h2>
    </div>
    <?php
     //Error control
     if(!isset($_POST["action"])){
        echo "Error: Action undefined"?> <br>
    <a href="admin_session.php">Back</a>
    <?php exit();
    }
    if(!isset ($_POST["id"])){
        echo"Error: ID undefined";?> <br>
    <a href="admin_session.php">Back</a>
    <?php exit();
    }?>
    <!-- Container -->
    <div class="container" mx-3 my-1>
        <?php
    echo "Action: " .$_POST["action"]."<br>";
    echo "Id products: " .$_POST["id"]."<br>";?>
    </div><?php
   
//Based on the selected action, it calls one function or the other 
switch($_POST["action"]){
    case "New":
        createFormProducts();
    break;
    case "Modify":
        modifyFormProducts();
    break;
    case "Delete";
        deleteFormProducts();
break;
}
//Show interface with empty fields to create a new product
function createFormProducts(){?>
    <div class="container p-3 my-3 border">
        <div class="text-info mx-5"> Añadir Producto</div>
        <form action="functions_products.php" method="post">
            <input type="hidden" name="function_name" value="create_products">
            <div class="form-group">
                <label for="id">Id:</label>
                <input type="text" class="form-control" placeholder="Enter id" name="id">
            </div>
            <div class="form-group">
                <label for="name">Nombre:</label>
                <input type="text" class="form-control" placeholder="Enter name" name="name" required>
            </div>
            <div class="form-group">
                <label for="description">Descripción:</label>
                <input type="text" class="form-control" placeholder="Enter description" name="description" required>
            </div>
            <div class="form-group">
                <label for="price">Precio:</label>
                <input type="text" class="form-control" placeholder="Enter price" name="price" required>
            </div>
            <div class="form-group">
                <label for="picture">Url Foto:</label>
                <input type="text" class="form-control" placeholder="Enter picture" name="picture"required>
            </div>
            <div class="form-group">
                <label for="category">Categoria ID:</label>
                <select name="category" class="form-control" placeholder="Enter category">
                    <option value="1">Tartas Cumpleaños</option>
                    <option value="2">Tartas Personalizadas</option>
                    <option value="3">Tartas Temáticas</option>
                    <option value="4">Tarta Crema</option>
                </select>
            </div>
            <button type="submit" class="btn btn-info">Guardar</button>
        </form>
    </div>
    <?php
}
//Show fields to modify the product.
function modifyFormProducts(){
    $products = get_products($_POST['id']);?>
    <div class="container p-3 my-3 border">
        <div class="text-info mx-5"> Modificar Registro</div>
        <form action="functions_products.php" method="post">
            <input type="hidden" name="function_name" value="modify_products">
            <input type="hidden" name="id" value="<?php echo $products['ID_PRODUCTO']?>" required>
            <div class="form-group">
                <label for="name">Nombre:</label>
                <input type="text" class="form-control" name="name" value="<?php echo $products['NOMBRE']?>" required>
            </div>
            <div class="form-group">
                <label for="description">Descripción:</label>
                <input type="text" class="form-control" name="description" value="<?php echo $products['DESCRIPCION']?>"
                    required>
            </div>
            <div class="form-group">
                <label for="price">Precio:</label>
                <input type="text" class="form-control" name="price" value="<?php echo $products['PRECIO']?>" required>
            </div>
            <div class="form-group">
                <label for="picture">Url Foto:</label>
                <input type="text" class="form-control" name="picture" value="<?php echo $products['URL_FOTO']?>"
                    required>
            </div>
            <div class="form-group">
                <label for="category">Categoria ID:</label>
                <select name="category" class="form-control" placeholder="Enter category">
                    <option value="1">Tartas Cumpleaños</option>
                    <option value="2">Tartas Personalizadas</option>
                    <option value="3">Tartas Temáticas</option>
                    <option value="4">Tarta Crema</option>
                </select>
            </div>
            <button type="submit" class="btn btn-info">Guardar</button>
        </form>
    </div>
    <?php
}
//Show fields to delete the product
function deleteFormProducts(){?>
    <!-- <div class="text-primary mx-5"> Delete register</div> -->
    <form action="functions_products.php" method="post">
        <input type="hidden" name="function_name" value="delete_products">
        <input type="hidden" name="id" value="<?php echo $_POST['id']?>">
        <label class="lead font-weight-bolder text-danger mx-5" for="isDeleteproducts">¿Estás seguro de borrar la
            categoria?</label>
        <input class="btn btn-info" type="submit" value="SI">
        <a href="admin_session.php" class="btn btn-info mx-3" role="button">NO</a>
    </form>
    <?php
}?>
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