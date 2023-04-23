<?php
require("conexion.php");
if (empty($_SESSION['usuario'])) {
    header('location:../login.php');
}

?>

<html>
<head>
<link rel="stylesheet" type="text/css" href="foto.css">
</head>
<body>
    <div id="user">
        <center>
            <h1>Album de fotos</h1>
            <a href="crearalbum.php"><button class="btn success">Crear un album</button><br><br>
            <a href="anadirfoto.php"><button class="btn success">Añadir una foto</button><br><br>
            <a href="veralbum.php"><button class="btn success">Ver un album</button><br><br>
            <a href="verperfil.php"><button class="btn success">Ver perfil</button><br><br>
            <a href="buscarfoto.php"><button class="btn success">Buscar foto</button><br><br>
            <!-- <a href="cerrarsesion.php"><button class="btn success">Cerrar sesion</button> -->
            <a href="http://localhost/mi-vida-facil/indexglobal.php"><input class="atras" type="button" value="Atras"> </a>
        </center>
    </div>

</body>
</html>
