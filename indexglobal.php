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
        <link rel="stylesheet" type="text/css" href="css/footer.css">
        <div class="header">
            <div class="container-presentacion">
                <?php echo "Bienvenid@ ".$_SESSION["usuario"]?></br> 
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
        
        <!--Accesos directos -->
        <div class="logos">
            <center>
            <div class="acesso">
            <a href="acceso-directo.html">
                <button class="accesoDirecto" role="button">Accesos<br>Directos</button>    
            </a>
            </div>
            </center>
        </div>

        <div class="container-item">
            <center>                
                <div id="album">
                    <a href="Album/index.php">
                        <img src="img/Album.png"
                            width="15%"
                            height="15%">
                    </a>    
                </div>
                <div id="notas">
                    <a href="Notes_React/public/index.html">
                        <img src="img/notas.png"
                        width="15%"
                        height="15%">
                    </a>
                </div>

                <div id="recetas">
                    <a href="video.php">
                        <img src="img/recetario.png"
                        width="15%"
                        height="15%">
                    </a>
                </div>     
            </center>
        </div>

    </body>

    <footer>
        <center>
            <div class="boton">
                    <button class="btn" type="button" onclick="popup()">¿Necesitas ayuda?<br> Te llamamos</button><br>
            </div>
        </center>
    </footer>


    <script>
        function popup(){
            let popup = window.open("popup.html","","width=500, height=500,menubar=no,scrollbars=yes,toolbar=no,location=no,directories=no,resizable=no,top=300,left=800");
            window.setTimeout(function() {
                popup.close();
                }, 6000)

        }
    </script>

</html>
