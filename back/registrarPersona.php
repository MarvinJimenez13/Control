<?php
  include 'config.php';

  if(isset($_POST['guardarPersona']) && $_POST['nombre'] != ""){
    $nombre = $_POST['nombre'];
    $correo = $_POST['correo'];
    $query = "INSERT INTO personas (nombre, correo) VALUES ('$nombre', '$correo')";
    $consulta = $conexion->query($query);

    if($consulta){
      header('Location:../personas.php#personasRegistradas');
    }else{
      echo "Error al insertar en la base de datos.";
    }
  }else{
    header('Location:../personas.php#personasRegistradas');
  }
?>
