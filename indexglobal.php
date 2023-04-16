<?php

require ('conexion.php');
    
    if (empty($_SESSION['usuario'])){
      header ('location:login.php');
   };
?>

<!DOCTYPE html>

<html lang="es">

    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="css/index.css">
        <div class="header">
            <div class="container-presentacion">
                <?php echo "Bienvenid@ ".$_SESSION["usuario"]?></br> 
    <!--Esto tengo que hacerlo con Javascript -->
            </div>

            <div class="container-title">
                <h1>Mi vida fácil</h1>
            </div>

        </div>
    </head>


    <body>
        <div class="title">
            <center>
                <h2>¿Qué deseas hacer?</h2>
            </center>
        </div>

        <div class="logos">
            <!--poner los enlaces directos -->
            <center>
                <div class="contacto">
                    <a href="contactos.html">
                        <img src="img/contact-book.png">
                    </a>
                </div>
                <div class="banco">
                    <a href="banco.html">
                       <img src="img/piggy-bank.png">
                    </a>    
                </div>
                <div class="facebook">
                    <a href="https://es-es.facebook.com/">
                        <img src="img/facebook.png"
                        >
                    </a>
                </div>
            </center>
        </div>

        <div class="container-item">
            <center>
                
            <!--poner los enlaces directos -->
                <div id="album">
                    <a href="Album/index.php">
                        <img src="img/Album.png"
                            width="15%"
                            height="15%">
                    </a>    
                </div>
                <div id="notas">
                    <img src="img/notas.png"
                    width="15%"
                    height="15%">
                </div>

                <div id="recetas">
                    <img src="img/recetario.png"
                    width="15%"
                    height="15%">
                </div>     
            </center>
        </div>

    </body>

</html>