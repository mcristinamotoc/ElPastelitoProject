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
    if($result){
        echo "Categoria Añadida";?>
<a href="admin_session.php"> LISTA CATEGORIAS </a>
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
   echo $query;

    if($result){
        echo "Modified category";?>
<a href="admin_session.php"> LISTA CATEGORIAS </a>
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
    echo $query;
   
    if($result){
        echo "category deleted";?>
<a href="admin_session.php"> LISTA CATEGORIAS </a> <br>
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