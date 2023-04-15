<?php
session_start();
if (empty($_SESSION['usuario'])){
    header ('location:../login.php');
 };
$_SESSION['IdFoto']=$_GET['IdFoto'];
header("location:detalles.php");
?>