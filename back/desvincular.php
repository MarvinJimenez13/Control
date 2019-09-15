<?php 
include 'config.php';

$idPersona = $_GET['idPersona'];

if(isset($_POST['desvincularEquipo'])){
    $idPerif = $_GET['idEquipo'];
    $query = "UPDATE equipo SET Personas_idPersonas = NULL WHERE Equipos_idEquipos = '$idPerif'";
    $consulta = $conexion->query($query);

    if($consulta){
        header('Location:../vistas/vistaPersona.php?id='.$idPersona.'');
    }else{
        echo "Error en la desvincualción";
    }
}

if(isset($_POST['desvincularPeriferico'])){
    $idPerif = $_GET['idPeriferico'];
    $query = "UPDATE perifericos SET Personas_idPersonas = NULL WHERE idPeriferico = '$idPerif'";
    $consulta = $conexion->query($query);

    if($consulta){
        header('Location:../vistas/vistaPersona.php?id='.$idPersona.'');
    }else{
        echo "Error en la desvincualción";
    }
}

?>