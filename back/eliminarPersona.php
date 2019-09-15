<?php
  include 'config.php';
  if(isset($_GET['id'])){
    $id = $_GET['id'];
    $queryEquipos = "UPDATE equipo SET Personas_idPersonas = NULL WHERE Personas_idPersonas = '$id'";
    $queryPerifericos = "UPDATE perifericos SET Personas_idPersonas = NULL WHERE Personas_idPersonas = '$id'";
    $consultaEquipos = $conexion->query($queryEquipos);
    $consultaPerif = $conexion->query($queryPerifericos);
    
    if($consultaEquipos && $consultaPerif){
      $query = "DELETE FROM personas WHERE idPersonas = '$id'";
      $consulta = $conexion->query($query);
      echo $id;
      if($consulta){
        header('Location: ../personas.php');
      }else{
        echo "Error al eliminar Persona";
      }
    }
  }
 ?>
