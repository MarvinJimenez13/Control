<?php
  include 'config.php';
  if(isset($_POST['eliminarEquipo'])){
    if(isset($_GET['id'])){
      $id = $_GET['id'];
      echo $id;
      $query = "DELETE FROM equipo WHERE Equipos_idEquipos = '$id'";
      $consulta = $conexion->query($query);
      if($consulta){
        header('Location: ../equipos.php');
      }
    }
  }
 ?>