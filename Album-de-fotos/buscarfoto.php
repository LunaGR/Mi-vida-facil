<?php

require ('conexion.php');
    
    if (empty($_SESSION['usuario'])){
      header ('location:login.php');
   };
?>

<html>
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/css/bootstrap.min.css" integrity="sha384-Zug+QiDoJOrZ5t4lssLdxGhVrurbmBWopoEl+M6BdEfwnCJZtKxi1KgxUyJq13dy" crossorigin="anonymous">
     

	<link href="//oss.maxcdn.com/jquery.bootstrapvalidator/0.5.2/css/bootstrapValidator.min.css" rel="stylesheet"></link>
   

  </head>
  <body>

   <!-- capa contenedor con los elementos del formulario de Registro de Usuarios -->
   <div class="container">
  

   <!--capa para Mostrar los Paises almacenados en la tabla Paises de la base de datos PIBd--> 
    <form class="form-group" action="buscarfoto.php" method="post" 
    enctype="multipart/form-data">
    <label for="foto"><b>Foto*</b></label>
    <select class="form-control" id="foto" name="foto">
    	<?php 
    	/* conecta con la base de datos PIBD de Mysql */
    	include ("conexion.php");
    	
    	/* construir la consulta que me devuelve los paises-- pero no lanzo la 
    	   petición a MYSQL  */
         $sql="select * from foto where IdUsuario='".$_SESSION['idusuario']."';";
         $result = mysqli_query($con, $sql);
    	
    	/* Lanzo la consulta a MYSQL y los resultados de la consulta los almacena en 
    	    $result. $result es una zona de memoria virtual donde se almacenan las filas que ha devuelto la consulta definida en $query */
		 /* entra en un bucle y en cada iteración del bucle recupera una fila de $result 
		 En $row tengo un array asociativo donde cada campo es una columna de la consulta*/ 
			while($row = mysqli_fetch_assoc($result)) {
        		echo "<option value=".$row['IdFoto'].">".$row['NomFoto']."</option>";}
          //cierra conexión 
          mysqli_close ($con);  
        ?>

    </select>
    <div class="invalid-feedback"></div>
                <br>
                <br>
  
   <!-- Botón para enviar  -->
   <button type="submit" class="btn btn-success" name="Enviar">Enviar</button>
   <a class="btn btn-success" href="login.php">Volver al login</a>
   <a class="btn btn-success" href="index.php">Volver al menu de admin</a>
   </form>

   <?php
require_once('validar.php');
if (isset($_REQUEST['Enviar'])) {
  buscarfoto();
}
?>
       	 </div> 

    <!-- Enlaces a los servidores de BOotstrap Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/js/bootstrap.min.js" integrity="sha384-a5N7Y/aK3qNeh15eJKGWxsqtnX/wWdSZSKp+81YjTmS15nvnvxKHuzaWwXHDli+4" crossorigin="anonymous"></script>


  </body>
</html>
