<?php
session_start();
?>

<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/css/bootstrap.min.css"
    integrity="sha384-Zug+QiDoJOrZ5t4lssLdxGhVrurbmBWopoEl+M6BdEfwnCJZtKxi1KgxUyJq13dy" crossorigin="anonymous">

  <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet">
  </link>

  <link href="//oss.maxcdn.com/jquery.bootstrapvalidator/0.5.2/css/bootstrapValidator.min.css" rel="stylesheet">
  </link>


</head>

<body>
  <div class="container">


    <form id="formregistro" action="registrousuario.php" method="post" enctype="multipart/form-data">

      <div class="form-group">
        <label for="nombre"><b>Nombre</b></label>
        <input type="text" class="form-control" id="nombre" name="nombre" required>

      </div>
      <div class="form-group">
        <label for="clave"><b>Contraseña</b></label>
        <input type="password" class="form-control" id="clave" name="clave" required>
        <div class="invalid-feedback"></div>
      </div>

      <div class="form-group">
        <label for="email"><b>Email</b></label>
        <input type="email" class="form-control" id="email" placeholder="name@ejemplo.com" name="email" required>
        <div class="invalid-feedback"></div>
      </div>

      <div class="form-check-inline">
        <label for="sexo"><b>Sexo</b> 
        <input class="form-check-input" type="radio" name="sexo" id="exampleRadios1" value="0">
        <label class="form-check-label" for="exampleRadios1">Hombre </label>
        <input class="form-check-input" type="radio" name="sexo" id="exampleRadios2" value="1">
        <label class="form-check-label" for="exampleRadios2">Mujer</label>
      <div class="invalid-feedback"></div>
      </div>

      <div class="form-group">
        <label for="fechanac"><b>Fecha Nacimiento</b></label>
        <input type="date" class="form-control" id="fechanac" name="fechanac" required>
        <div class="invalid-feedback"></div>
      </div>

      <div class="form-group">
        <label for="ciudad"><b>Ciudad  </b></label>
        <input type="text" class="form-control" id="ciudad" name="ciudad">
        <div class="invalid-feedback"></div>
      </div>

      <div class="form-group">
        <label for="pais"><b>Pais</b></label>
        <select class="form-control" id="pais" name="pais">
          <?php
            include("conexion.php");
            $sql = "select * from pais";
            $result = mysqli_query($con, $sql);

            if (mysqli_num_rows($result) > 0) {
              while ($row = mysqli_fetch_assoc($result)) {
                echo "<option value=" . $row['IdPais'] . ">" . $row['NomPais'] . "</option>";
              }}
            mysqli_close($con);
          ?>

        </select>
        <div class="invalid-feedback"></div>
      </div>

      <div class="form-group">
        <label for="exampleFormControlFile1"><b>Foto</b></label>
        <input type="file" class="form-control-file" id="exampleFormControlFile1" 
        name="foto"/>
     </div> 

      <button type="submit" class="btn btn-success" name="Registrar">Registrar</button><br><br>
      <a class="btn btn-success" href="login.php">Volver al login</a><br><br>
    </form>

  </div>

  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
    integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
    crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
    integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
    crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/js/bootstrap.min.js"
    integrity="sha384-a5N7Y/aK3qNeh15eJKGWxsqtnX/wWdSZSKp+81YjTmS15nvnvxKHuzaWwXHDli+4"
    crossorigin="anonymous"></script>

</body>

</html>

<?php
require_once('validar.php');
if (isset($_REQUEST['Registrar'])) {
  registrousuario();
}
?>