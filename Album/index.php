<?php
require("conexion.php");
if (empty($_SESSION['usuario'])) {
    header('location:../login.php');
}

?>

<html>
<head>

</head>
<body>
    <h1>Página del Usuario</h1>
    <a href="crearalbum.php"><button class="btn success">Crear un album</button><br><br>
    <a href="anadirfoto.php"><button class="btn success">Añadir una foto</button><br><br>
    <a href="veralbum.php"><button class="btn success">Ver un album</button><br><br>
    <a href="verperfil.php"><button class="btn success">Ver perfil</button><br><br>
    <a href="buscarfoto.php"><button class="btn success">Buscar foto</button><br><br>
    <a href="cerrarsesion.php"><button class="btn success">Cerrar sesion</button>
</body>
</html>