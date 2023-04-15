<?php

require ('conexion.php');
    
if (empty($_SESSION['usuario'])){
    header ('location:../login.php');
 };
?>

<html>
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/css/bootstrap.min.css" integrity="sha384-Zug+QiDoJOrZ5t4lssLdxGhVrurbmBWopoEl+M6BdEfwnCJZtKxi1KgxUyJq13dy" crossorigin="anonymous">
   <!-- Bootstrap Validator -->
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet"></link>

	<link href="//oss.maxcdn.com/jquery.bootstrapvalidator/0.5.2/css/bootstrapValidator.min.css" rel="stylesheet"></link>
   

  </head>
  <body>

   <!-- capa contenedor con los elementos del formulario de Registro de Usuarios -->
   <div class="container">
       
        <form id="formregistro" action="crearalbum.php" method="post" 
    enctype="multipart/form-data"  >
    
     <!-- capa titulo del album -->   	
  <div class="form-group">
    <label for="titulo"><b>Titulo *</b></label>
    <input type="text" class="form-control" id="titulo" name="titulo" required>
             
    </div>
  <!-- capa descripcion del album -->
   <div class="form-group">
    <label for="descripcion"><b>Descripcion *</b></label>
    <textarea rows="15" cols="50" class="form-control" id="descripcion" name="descripcion" required></textarea>
     <div class="invalid-feedback"></div>
    </div>
   
 <!-- capa con fecha --> 
   <div class="form-group">
    <label for="fecha"><b>Fecha *</b></label>
    <input type="date" class="form-control" id="fecha" name="fecha" required >
    <div class="invalid-feedback">Fecha debe ser válida</div>
   </div>
    
    <!-- Botón para enviar-->
   <button type="submit" class="btn btn-success" name="Registrar">Registrar</button>
   <a class="btn btn-success" href="index.php">Volver al menu</a>
   </form>
   
   </div>
    <!-- Enlaces a los servidores de BOotstrap Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/js/bootstrap.min.js" integrity="sha384-a5N7Y/aK3qNeh15eJKGWxsqtnX/wWdSZSKp+81YjTmS15nvnvxKHuzaWwXHDli+4" crossorigin="anonymous"></script>
  
   </body>
</html>


<?php
require_once('validar.php');
if (isset($_REQUEST['Registrar'])) {
  crearalbum();
}
?>