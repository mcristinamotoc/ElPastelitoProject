<!-- The database connection file -->
<?php
require '../connection.php';

//Switch cases choose functions
if(isset($_POST["function_name"])){
    switch($_POST["function_name"]){
        case"create_products":
            create_products();
        break;
        case "modify_products":
            modify_products();
        break;
        case"delete_products":
            delete_products();
        break;
    }
}
//Function Create New Category
function create_products(){
   global $mysqli;
    $query = "INSERT INTO PRODUCTOS ( ID_PRODUCTO, NOMBRE, DESCRIPCION, PRECIO, URL_FOTO, CATEGORIA_ID) VALUES (";
    $query .="'" . $_POST['id'] . "', ";
    $query .="'" . $_POST['name'] . "' , ";
    $query .="'" . $_POST['description'] . "' , ";
    $query .="'" . $_POST['price'] . "' , ";
    $query .="'" . $_POST['picture'] . "' , ";
    $query .="'" . $_POST['category'] . "'); "; 
    $result = mysqli_query($mysqli, $query);
    if($result){
        echo "Producto Añadido";?>
<a href="admin_session.php">LIST PRODUCTOS</a>
<?php
    }else{
        echo "Error query:" . mysqli_error($mysqli);
    }
    //Closing connection database
$mysqli->close();

}
//Function Modify products
function modify_products(){
    global $mysqli;
    $query = "UPDATE PRODUCTOS ";
    $query .= "SET ";
    $query .= " NOMBRE ='" . $_POST['name']. "',";
    $query .= " DESCRIPCION ='" . $_POST['description']. "',";
    $query .= " PRECIO ='" . $_POST['price']. "' ,";
    $query .= " URL_FOTO ='" . $_POST['picture']. "',";
    $query .= " CATEGORIA_ID ='" . $_POST['category']. "' ";
    $query .= " WHERE ID_PRODUCTO='" . $_POST['id']."'";
    $result = mysqli_query($mysqli, $query);
   echo $query;
  
    if($result){
        echo "Modified products";?>
<a href="admin_session.php">LIST PRODUCTOS</a>
<?php
    }else{
        echo "Error query:".mysqli_error($mysqli);
    }
    //Closing connection database
    $mysqli->close();
}

//Function Delete products
function delete_products(){
   global $mysqli;
    $query = " DELETE FROM PRODUCTOS ";
    $query .= "WHERE ID_PRODUCTO={$_POST['id']}";
    $result = mysqli_query($mysqli, $query);
    echo $query;
   
    if($result){
        echo "products deleted";?>
<a href="admin_session.php">LIST PRODUCTOS</a> <br>
<?php
    }else{
        echo "Error query:" .mysqli_error($mysqli);
    }
//Closing connection database
    $mysqli->close();
}

//Function Select products From Database
function get_products($id){
   global $mysqli;
    $query = "SELECT * FROM PRODUCTOS WHERE ID_PRODUCTO = '$id'";
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