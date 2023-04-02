<?php
require("conexion.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuario = $_POST["usuario"];
    $contraseña = $_POST["contraseña"];

    $sql = "select * from usuario where nombre='" . $usuario . "' AND pass='" . $contraseña . "'";

    $resultado = mysqli_query($con, $sql);

    $row = mysqli_fetch_array($resultado);

}

?>

<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" type="text/css" href="index.css">
</head>

<body id="login">
    <center>
        <div id="containerLogin">
            <h1>Login</h1>
            <br><br><br>
            <form action="#" method="POST">
                <div>
                    Usuario: <input type="text" name="usuario" required>
                </div>
                <br>
                <div>
                    Contraseña: <input type="password" name="contraseña" required>
                </div>
                <br>
                <div>
                    <input type="submit" value="login">
                </div>
                <br>
            </form>
        </div>
    </center>
</body>


</html>