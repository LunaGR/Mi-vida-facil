<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<link rel="stylesheet" src="style.css">
<!------ Include the above in your HEAD tag ---------->

<body>
    <div id="login">
        <h3 class="text-center text-white pt-5">Login form</h3>
        <div class="container">
            <div id="login-row" class="row justify-content-center align-items-center">
                <div id="login-column" class="col-md-6">
                    <div id="login-box" class="col-md-12">
                        <form id="login-form" class="form" action="" method="post">
                            <h3 class="text-center text-info">MI VIDA FACIL</h3>
                            <div class="form-group">
                                <label for="usuario" class="text-info">Nombre de usuario:</label><br>
                                <input type="text" name="usuario" id="usuario" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="contraseña" class="text-info">Contraseña:</label><br>
                                <input type="password" name="contraseña" id="contraseña" class="form-control">
                            </div>
                            <div class="form-group">
                                <input type="submit" name="Enviar" class="btn btn-info btn-md" value="Enviar">
                            </div>
                            <div id="register-link" class="text-right">
                                <a href="Album/registrousuario.php" class="text-info">¿No tienes cuenta aún? Regístrate</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

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
            header("location:indexglobal.php");
    }
}
?>