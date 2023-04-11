<?php
if(!isset($_SESSION)) {
    session_start();
}

$servername = "localhost";
$username = "root";
$password = "";
$db_name= "proyecto";
// Nos conectamos a la base de datos
$con = mysqli_connect($servername, $username, $password, $db_name) or die ("Error a la hora de conectarse a la base de datos");
?>