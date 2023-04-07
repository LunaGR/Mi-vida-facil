<?php
// Validacion registro usuario
function registrousuario() {
require("conexion.php");
$banderanombre = 1;
$sql = "select NomUsuario from usuario where NomUsuario='" . $_POST['nombre'] . "'";
$result = mysqli_query($con, $sql);

if (mysqli_num_rows($result) > 0) {
    echo "Aviso. El usuario existe";
    $banderanombre = 0;
}

if ($banderanombre == 1) {
 
    $nombre = $_POST["nombre"];
    $clave = $_POST["clave"];
    $email = $_POST["email"];
    $sexo = $_POST["sexo"];
    $fechanac = $_POST["fechanac"];
    $ciudad = $_POST["ciudad"];
    $pais = $_POST["pais"];

    // insertar las fotos
    $fileName = $_FILES["foto"]["name"];
    $fileTmpLoc = $_FILES["foto"]["tmp_name"];
    // Path and file name01
    $dir_subida = "./usuarios/".$nombre."/perfil";
    if (!is_dir($dir_subida)) {
        mkdir($dir_subida, 0777, true);
    }
    $fichero_subido = "./usuarios/".$nombre."/perfil/$fileName";
    // Run the move_uploaded_file() function here
    $moveResult = move_uploaded_file($fileTmpLoc, $fichero_subido);

    $sql = "insert into usuario(IdUsuario, NomUsuario, Clave, Email, Sexo, FNacimiento, Ciudad, Pais, Foto, FRegistro) 
    values('', '$nombre', $clave, '$email', '$sexo' ,'$fechanac', '$ciudad', '$pais', '$fichero_subido', current_time)";

    if (mysqli_query($con, $sql)) {
        echo "Nuevo usuario creado satisfactoriamente";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($con);
    }
    mysqli_close($con);
}
}

// Validacion crear un album
function crearalbum() {
    if (empty($_SESSION['usuario'])){
        header ('location:login.php');
     };
require ('conexion.php');
    $sql="select IdUsuario from Usuario where NomUsuario='".$_SESSION['usuario']."';";

    $result = mysqli_query($con, $sql);

    if (mysqli_num_rows($result) > 0) {
        while($row = mysqli_fetch_assoc($result)) {
            // echo "El usuario actual es " . $_SESSION['usuario'] . " y su ID es "  . $row['IdUsuario']. "<br>" . "<br>";

            $idusuario = $row['IdUsuario'];

            if (isset($_REQUEST['Registrar'])) { 
              // banderas a valor 0 indican errores, a valor 1 indican correcto

          /* formato de la petición de inserción mediante orden sql */
           $query="select * from usuario";


              $sql="insert into album values ('','".$_REQUEST['titulo']."','".$_REQUEST['descripcion']."','".$_REQUEST['fecha']."','".$idusuario."');";

              if (mysqli_query($con, $sql)) {
             echo "<font color=green>Álbum creado correctamente</font>";
         } else {
             echo "<font color=red>Error: " . $sql . "<br>" . mysqli_error($con) . "</font>";
         }

         mysqli_close($con);
             }
        }
    };
}

// Validacion añadir una foto
function anadirfoto() {
require("conexion.php");
if (empty($_SESSION['usuario'])){
    header ('location:login.php');
 };

          /* formato de la petición de inserción mediante orden sql */
$sql="select * from Usuario where NomUsuario='".$_SESSION['usuario']."'";

    $result = mysqli_query($con, $sql);
    if (mysqli_num_rows($result) > 0) {
        while($row = mysqli_fetch_assoc($result)) {
            $idusuario = $row['IdUsuario'];
        }
    }

    $dir_subida = "./usuarios/".$_SESSION['usuario']."/albumes/";
    if (!is_dir($dir_subida)) {
        mkdir($dir_subida, 0777, true);
    }
    $idalbum = $_POST['album'];
    $tipo = $_FILES['fichero']['type'];
    if ($tipo != 'image/png' && $tipo != 'image/jpg' && $tipo != 'image/jpeg') {
        echo "<font color=red>Formato de imagen incorrecto</font>";
        exit;
    } 
    
    $query="select * from album where IdAlbum=$idalbum";
    $result= mysqli_query($con,$query);
    
    if (mysqli_num_rows($result) > 0) {
        while($row = mysqli_fetch_assoc($result)) {
            $nombrealbum = $row['Titulo'];
        }
    }
    
    $fichero_subido = $dir_subida.basename($_FILES['fichero']['name']); 
    move_uploaded_file($_FILES['fichero']['tmp_name'], $fichero_subido);
    
    // Insertar los datos si el formato es correcto
        $sql="insert into foto values ('','".$idusuario."','".$_REQUEST['nombre']."','".$_REQUEST['fechacrea']."',".$_REQUEST['album'].",'".$fichero_subido."',current_time)";
    
        if (mysqli_query($con, $sql)) {
            echo "<font color=green>Foto añadida correctamente</font>";
        } else {
            echo "<font color=red>Error: " . $sql . "<br>" . mysqli_error($con) . "</font>";
        }
}

// Validación de ver un album
function veralbum() {
       if (isset($_REQUEST['Enviar']))
       { 
          include ('conexion.php');
   $variable = $_POST['album'];
   $sql="select * from foto where Album=$variable";
   $result = mysqli_query($con,$sql);
   
   if (mysqli_num_rows($result) > 0) {
        while($row = mysqli_fetch_assoc($result)) {
            $nombre = $row["NomFoto"];
            $fichero = $row['Fichero'];
            $fecha_original = $row['Fecha'];
            $fecha = DateTime::createFromFormat('Y-m-d', $fecha_original);
            $fecha_formateada = $fecha->format('d/m/Y');
            echo "<div span style=\"text-align: center\">";
            echo "<div>"; 
            echo "<span style=\"font-weight: bold\">  Nombre de la foto: </span>" .$nombre."<br>";
            echo "<span style=\"font-weight: bold\">  Fecha: </span>".$fecha_formateada."<br>";
            echo "</div>";
            echo "<div span style=\"float: center\">";
            echo "<img src=$fichero alt 'Foto' width='300px' height='300px'/>"."<br>";
            echo "</div>"."<br>"."<br>";
        }
        mysqli_close($con);
   }
       	 };
}

// Validacion de ver perfil
function verperfil() {
include ('conexion.php');
  $sql= "select * from usuario where NomUsuario='".$_SESSION['usuario']."'";
    $result = mysqli_query($con, $sql);

    if (mysqli_num_rows($result) > 0) {
        
    // output data of each row
         while($row = mysqli_fetch_assoc($result)) {
             // se crea la variable de sesión usuario 
        $_SESSION['usuario']=$row['NomUsuario'];
        echo "Nombre: " . $row["NomUsuario"]. "<br>";
        echo "Email: " . $row['Email']. "<br>";
        
        if ( $row['Sexo']== 1) {
            echo "Sexo: Mujer <br>";
        }
        else {
            echo "Sexo: Hombre <br>";
        }
        $fecha_original = $row['FNacimiento'];
        $fecha = DateTime::createFromFormat('Y-m-d', $fecha_original);
        $fecha_formateada = $fecha->format('d/m/Y');
        echo "Fecha nacimiento: " .$fecha_formateada. "<br>";
        echo "Ciudad: " . $row['Ciudad']. "<br>";
        
        // tenemos que hacer una consulta a la tabla paises para mostrar el nombre
         $sql = "select * from pais where IdPais=".$row['Pais'];
        $result = mysqli_query($con, $sql);
        while($row1 = mysqli_fetch_assoc($result)) {
            echo "Pais: " .$row1['NomPais']."<br>";
        }
        $fecharegistro = $row['FRegistro'];
        $fecha2 = DateTime::createFromFormat('Y-m-d H:i:s', $fecharegistro);
        $fecha_formateada2 = $fecha2->format('d/m/Y H:i:s'); // formato con hora, minutos y segundos
        echo "Fecha de Registro: " .$fecha_formateada2. "<br>";
        echo "Foto: <img src='".$row['Foto']."'/>";"<br>";
    }
}
    mysqli_close($con);
}

// Validacion buscar foto
    function buscarfoto() {
       if (isset($_REQUEST['Enviar']))
       { 
          include ('conexion.php');
   $var = $_POST['foto'];
   $sql="select * from foto where IdFoto=$var";
   $result = mysqli_query($con,$sql);
   
   if (mysqli_num_rows($result) > 0) {
        while($row = mysqli_fetch_assoc($result)) {
            $fichero = $row['Fichero'];
            echo "<div span style=\"text-align: center\">";
            echo "<div span style=\"float: center\">";
            echo "<img src=$fichero alt 'Foto' width='300px' height='300px'/>"."<br>"."<br>";
            echo "<th scope='col'><a href=\"sesionverdetalles.php?IdFoto=".$row['IdFoto']."\">Detalles</a></th>";
            echo "</div>"."<br>"."<br>";
        }
        mysqli_close($con);
   }
       	 };
}

// Validacion detalles de la foto
function verdetalles() {
include('conexion.php');
$idfoto=$_SESSION['IdFoto'];

$sql="select * from foto where IdFoto=$idfoto";
$result = mysqli_query($con,$sql);

if (mysqli_num_rows($result) > 0) {
        while($row = mysqli_fetch_assoc($result)) {
            $foto = $row['Fichero'];
            $nombre = $row['NomFoto'];
            $fecha_original = $row['Fecha'];
            $fecha = DateTime::createFromFormat('Y-m-d', $fecha_original);
            $fecha_formateada = $fecha->format('d/m/Y');
            echo "<span style=\"font-weight: bold\">  Foto: </span>"."<br>";
            echo "<img src=$foto alt 'Foto' width='300px' height='300px'/>"."<br>";
            echo "<span style=\"font-weight: bold\">  Nombre de la foto: </span>" .$nombre."<br>";
            echo "<span style=\"font-weight: bold\">  Fecha: </span>".$fecha_formateada."<br>";
            
                $idalbum=$row['Album'];
                $album="select * from album where IdAlbum=$idalbum";
                
                $resultado=mysqli_query($con,$album);
                if (mysqli_num_rows($resultado) > 0) {
                  while($row=mysqli_fetch_assoc($resultado)) {
                      $nombrealbum=$row['Titulo'];
                      $idusuario=$row['Usuario'];
                      echo "<span style= \"font-weight: bold \">Album: </span>".$nombrealbum."<br>";
                  }
                }
                
                
                $usuario="select * from usuario where IdUsuario=$idusuario";
                
                $resultadousuario=mysqli_query($con,$usuario);
                if (mysqli_num_rows($resultadousuario) > 0) {
                  while($row3=mysqli_fetch_assoc($resultadousuario)) {
                      $nombreusuario=$row3['NomUsuario'];
                      echo "<span style= \"font-weight: bold \">Usuario: </span>".$nombreusuario."<br>";
                  }
                }
        }
}
}
?>