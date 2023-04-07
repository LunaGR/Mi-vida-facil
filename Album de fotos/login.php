<!DOCTYPE html>
<html>

<head>

<body>
    <center>
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
                <input type="submit" value="Login">
            </div>
            <div>
                <label>
                    <p> Si no tienes cuenta </p> <a href='registrousuario.php'> Registrate </a>
                </label>
            </div>
            <br>
        </form>
    </center>
</body>
</head>

<?php
require("conexion.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuario = $_POST["usuario"];
    $contraseña = $_POST["contraseña"];

    $sql = "select * from usuario where NomUsuario='" . $usuario . "' AND Clave='" . $contraseña . "'";

    $resultado = mysqli_query($con, $sql);

    $row = mysqli_fetch_array($resultado);

    if ($row == null || !isset($row["NomUsuario"])) {
        echo "El usuario o contraseña son incorrectos";
    } elseif ($row["NomUsuario"] == $usuario) {
        $_SESSION["usuario"] = $usuario;
        $sql="select * from Usuario where NomUsuario='".$_SESSION['usuario']."';";
        $result = mysqli_query($con, $sql);
    
        if (mysqli_num_rows($result) > 0) {
        while($row = mysqli_fetch_assoc($result)) {
            $idusuario = $row['IdUsuario'];
            $_SESSION['idusuario'] = $idusuario;
        }
        mysqli_close($con);
        }
            header("location:index.php");
    }
}
?>

</html>
