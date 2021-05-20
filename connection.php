<?php 

// Connect to the database: localhost, user name, password, database name

$mysqli = new mysqli('localhost', 'root', '', 'ElPastelito');

if ($mysqli->connect_errno) {
    echo "Fallo al conectarse a MySQL debido a: \n";
    echo "Error numero: " . $mysqli->connect_errno . "\n";
    exit;
}
$mysqli->set_charset("utf8");
?>