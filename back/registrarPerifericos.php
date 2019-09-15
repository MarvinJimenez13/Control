<?php
include 'config.php';

if(isset($_POST['guardarTipo'])){
    $tipo = $_POST['tipoPeriferico'];

    $query = "INSERT INTO tipoperiferico (descripcion) VALUES ('$tipo')";
    $consulta = $conexion->query($query);

    if($consulta){
        header('Location: ../perifericos.php');
    }else{
        "Error al insertar en la base de datos.";
    }
}

if(isset($_POST['guardarPeriferico'])){
    $tipoPeriferico = $_POST['tipoPeriferico'];
    $resultado = preg_replace("/[^0-9]/", "", $tipoPeriferico);
    echo $resultado;
    $modeloPeriferico = $_POST['modeloPeriferico'];
    $marcaPeriferico = $_POST['marcaPeriferico'];
    $seriePeriferico = $_POST['seriePeriferico'];
    $fechaAsignacion = $_POST['fechaAsignacionPerif'];

    $query = "INSERT INTO perifericos (TipoPeriferico_idTipoPeriferico, marca, modelo, numeroSerie, fechaAsignacionPeriferico) 
    VALUES ('$resultado', '$marcaPeriferico', '$modeloPeriferico', '$seriePeriferico','$fechaAsignacion')";
    $consulta = $conexion->query($query);

    if($consulta){
        header('Location: ../perifericos.php');
    }else{
        echo "Error al insertar en la base de datos.";
    }
} 

if(isset($_POST['agregarPeriferico'])){
    if(isset($_GET['id'])){
        $idPersona = $_GET['id'];
        $idPeriferico = $_POST['periferico'];
        $query = "UPDATE perifericos SET Personas_idPersonas = '$idPersona' WHERE idPeriferico = '$idPeriferico'";
        $consulta = $conexion->query($query);

        if($consulta){
            header('Location: ../vistas/vistaPersona.php?id='.$idPersona.'');
        }else{
            echo "Error al agregar Periferico";
        }
    }
}

if(isset($_POST['editarPeriferico'])){
    $idPeriferico = $_GET['id'];

    $tipoPeriferico = $_POST['tipoPeriferico'];
    $resultado = preg_replace("/[^0-9]/", "", $tipoPeriferico);
    echo $resultado;
    $modeloPeriferico = $_POST['modeloPeriferico'];
    $marcaPeriferico = $_POST['marcaPeriferico'];
    $seriePeriferico = $_POST['seriePeriferico'];
    $fechaAsignacion = $_POST['fechaAsignacionPerif'];

    $query = "UPDATE perifericos SET TipoPeriferico_idTipoPeriferico = '$resultado', marca = '$marcaPeriferico', modelo = '$modeloPeriferico', 
    numeroSerie = '$seriePeriferico', fechaAsignacionPeriferico = '$fechaAsignacion' WHERE idPeriferico = '$idPeriferico'";
    $consulta = $conexion->query($query);

    if($consulta){
        header('Location: ../vistas/vistaPeriferico.php?id='.$idPeriferico.'');
    }else{
        echo "Error al insertar en la base de datos.";
    }
}

?>