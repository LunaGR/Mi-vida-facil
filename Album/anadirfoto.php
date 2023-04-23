<?php
require("conexion.php");
if (empty($_SESSION['usuario'])){
    header ('location:../login.php');
 };
?>

<html>
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	  
	<!--este Link lo puse yo (Luna) -->
      <link rel="stylesheet" type="text/css" href="album.css">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/css/bootstrap.min.css" integrity="sha384-Zug+QiDoJOrZ5t4lssLdxGhVrurbmBWopoEl+M6BdEfwnCJZtKxi1KgxUyJq13dy" crossorigin="anonymous">
     

	<link href="//oss.maxcdn.com/jquery.bootstrapvalidator/0.5.2/css/bootstrapValidator.min.css" rel="stylesheet"></link>
   

  </head>
  <body>

   <!-- capa contenedor con los elementos del formulario de Registro de Usuarios -->
   <div class="container">
  

    <form id="formregistro" action="anadirfoto.php" method="post" 
    enctype="multipart/form-data"  >
 
  <!-- capa titulo de la foto -->   	
  <div class="form-group">
    <label for="titulo"><b>Nombre de la foto *</b></label>
    <input type="text" class="form-control" id="nombre" name="nombre" required >
     <div class="invalid-feedback">Nombre de la foto debe ser válido</div>   
    </div>
     

    <!-- capa con fecha del album--> 
   <div class="form-group">
    <label for="fechacrea"><b>Fecha creacion  *</b></label>
    <input type="date" class="form-control" id="fechacrea" name="fechacrea"  >
    <div class="invalid-feedback">Fecha debe ser válida</div>
   </div>

    <!--capa para Mostrar los albumes almacenados en la tabla albumes de la base de datos PIBd--> 
    <div class="form-group">
    <label for="album"><b>Album *</b></label>
    <select class="form-control" id="album" name="album">
      <?php
      include ('conexion.php');
      $sql="select * from Usuario where NomUsuario='".$_SESSION['usuario']."';";
      echo $sql;
      $result = mysqli_query($con, $sql);
      
      if (mysqli_num_rows($result) > 0) {
        while($row = mysqli_fetch_assoc($result)) {
            $idusuario = $row['IdUsuario'];
            $_SESSION['idusuario'] = $idusuario;
        }
        mysqli_close($con);
      }
      
      /* conecta con la base de datos PIBD de Mysql */
      include ('conexion.php');
      /* construir la consulta que me devuelve los albumes-- pero no lanzo la 
         petición a MYSQL  */ 
      $sql="select * from Album where Usuario=$idusuario";
      $result= mysqli_query($con,$sql);
      
    if (mysqli_num_rows($result) > 0) {
      while($row = mysqli_fetch_assoc($result)) {
          $album = $row['Titulo'];
          echo $album;
          
            echo "<option value=".$row['IdAlbum'].">".$row['Titulo']."</option>";}
          //cierra conexión 
          mysqli_close ($con); 
    }
        ?>

    </select>
    <div class="invalid-feedback"></div>
  </div>

     <!-- capa para Subir foto .. Lo que se sube al servidor (localhost son las imágenes y en la base de datos se indica la ruta donde está la imagen --> 
   <div class="form-group">
    <label for="fichero"><b>Fichero</b></label>
    <input type="file" class="form-control-file" id="fichero" 
    name="fichero"/>
     </div> 

  
   <!-- Botón para enviar  -->
   <button type="submit" class="btn btn-success" name="Enviar">Enviar</button>
   <a class="btn btn-success" href="index.php">Volver al menu</a>
   </form>

   <?php
require_once('validar.php');
if (isset($_REQUEST['Enviar'])) {
  anadirfoto();
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
