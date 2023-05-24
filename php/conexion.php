<?php
$host = "localhost";
$user = "root";
$pass = "";
$db_name = "mividafacil";

session_start();

$con = mysqli_connect($host,$user,$pass,$db_name) or die("Error al conectar con la base de datos");
?>