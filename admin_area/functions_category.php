<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
        integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <script src="https://use.fontawesome.com/6234b7c045.js"></script>
    <link href="css/style.css" rel="stylesheet">
    <title> Reposteria Online Creativa</title>
</head>
<body> 
<!-- The database connection file -->
<?php
require '../connection.php';

//Switch cases choose functions
if(isset($_POST["function_name"])){
    switch($_POST["function_name"]){
        case"create_category":
            create_category();
        break;
        case "modify_category":
            modify_category();
        break;
        case"delete_category":
            delete_category();
        break;
    }
}
//Function Create New Category
function create_category(){
   global $mysqli;
    $query = "INSERT INTO CATEGORIAS ( ID_CATEGORIA, NOMBRE) VALUES (";
    $query .="'" . $_POST['id'] . "', ";
    $query .="'" . $_POST['name'] . "'); ";  
    $result = mysqli_query($mysqli, $query);

    if($result){?>
        <h4 class="text-info mx-5 my-1"><?php echo "Categoria Añadida ";?> </h4> 
<!-- Button Back to Main Page -->
<form role="form" method="post" action="admin_session.php">
    <input name="action" type="hidden" value="New">
    <button name="id" type="submit" class="btn btn-info mx-5 my-3">Volver</button>
</form>

<?php
    }else{
        echo "Error query:" . mysqli_error($mysqli);
    }
    //Closing connection database
$mysqli->close();
}
//Function Modify category
function modify_category(){
    global $mysqli;
    $query = "UPDATE CATEGORIAS ";
    $query .= "SET ";
    $query .= " NOMBRE ='" . $_POST['name']. "'";
    $query .= " WHERE ID_CATEGORIA='" . $_POST['id']."'";
    $result = mysqli_query($mysqli, $query);

   if($result){?>
    <h4 class="text-info mx-5 my-1"><?php echo "Categoria Modificada";?> </h4> 
<!-- Button Back to Main Page -->
<form role="form" method="post" action="admin_session.php">
<input name="action" type="hidden" value="New">
<button name="id" type="submit" class="btn btn-info mx-5 my-3">Volver</button>
</form>

<?php
    }else{
        echo "Error query:".mysqli_error($mysqli);
    }
    //Closing connection database
    $mysqli->close();
}

//Function Delete category
function delete_category(){
   global $mysqli;
    $query = " DELETE FROM CATEGORIAS ";
    $query .= "WHERE ID_CATEGORIA={$_POST['id']}";
    $result = mysqli_query($mysqli, $query);
   
    if($result){?>
        <h4 class="text-info mx-5 my-1"><?php echo "Categoria Borrada ";?> </h4> 
<!-- Button Back to Main Page -->
<form role="form" method="post" action="admin_session.php">
    <input name="action" type="hidden" value="New">
    <button name="id" type="submit" class="btn btn-info mx-5 my-3">Volver</button>
</form>

<?php
    }else{
        echo "Error query:" .mysqli_error($mysqli);
    }
//Closing connection database
    $mysqli->close();
}

//Function Select category From Database
function get_category($id){
   global $mysqli;
    $query = "SELECT * FROM CATEGORIAS WHERE ID_CATEGORIA = '$id'";
    $result = mysqli_query($mysqli, $query);
    $row = NULL;
    
    if($result){
        return $row = $result->fetch_assoc();
    }else{
        echo "Error query:" . mysqli_error($mysqli);
    }
    //Closing connection database
    $mysqli->close();  
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