<?php 
include 'config.php';

if(isset($_POST['guardarEquipo'])){
    $modelo = $_POST['modelo'];
    $numeroSerie = $_POST['numeroSerie'];
    $marca = $_POST['marca'];
    $tipo = $_POST['tipo'];
    $tipoMemoria = $_POST['tipoMemoria'];
    $memoria = $_POST['memoria'];
    $procesador = $_POST['procesador'];
    $discoDuroMecanico = $_POST['discoMecanico'];
    $discoSolido = $_POST['discoSolido'];
    $tamanoSolido = $_POST['tamanoSolido'];
    $tamanoMecanico = $_POST['tamanoMecanico'];
    $tarjetaGrafica = $_POST['tarjetaGrafica'];
    $fechaAsignacion = $_POST['fechaAsignacion'];
    $fechaUltimoFormateo = $_POST['fechaUltimoFormateo'];
    $observaciones = $_POST['observaciones'];
    $hdd = false;
    $ssd = false;
    if($discoDuroMecanico == 'Si'){
        $hdd = true;
    }
    if($discoSolido == 'Si'){
        $ssd = true;
    }

    $query = "INSERT INTO equipo (numeroSerie, modelo, fechaAsignacionEquipo, ultimaFechaFormateo, procesador,
    memoria, tipoMemoria, discoDuroSSD, discoDuroMecanico, tamañoSSD, tamañoDD, tarjetaGrafica, marca, tipo, observaciones)
    VALUES ('$numeroSerie', '$modelo', '$fechaAsignacion', '$fechaUltimoFormateo', '$procesador',
    '$memoria', '$tipoMemoria', '$ssd', '$hdd', '$tamanoSolido', '$tamanoMecanico',
    '$tarjetaGrafica', '$marca', '$tipo', '$observaciones')";

    $consulta= $conexion->query($query);

    if($consulta){
        header('Location:../equipos.php');
    }else{
        echo "Error al insertar en la base de datos.";
    }
}

if(isset($_POST['agregarEquipo'])){
    if(isset($_GET['id'])){
        $idPersona = $_GET['id'];
        $idPeriferico = $_POST['equipo'];

        $queryInicial = "SELECT * FROM equipo WHERE Personas_idPersonas = '$idPersona'";
        $consultaInicial = $conexion->query($queryInicial);

        $cont = mysqli_num_rows($consultaInicial);

        if($cont != 0){
            echo  "<script> var replica = confirm('No puedes registrar más de un equipo.');
            if(replica){ document.location = '../vistas/vistaPersona.php?id=".$idPersona."'}else{
                document.location = '../perifericos.php'}
        </script>";
        }else{
            $query = "UPDATE equipo SET Personas_idPersonas = '$idPersona' WHERE Equipos_idEquipos = '$idPeriferico'";
            $consulta = $conexion->query($query);
    
            if($consulta){
                header('Location: ../vistas/vistaPersona.php?id='.$idPersona.'');
            }else{
                echo "Error al agregar Equipo";
            }
        }

    }
}

if(isset($_POST['editarEquipo'])){
    $idEquipo = $_GET['id'];

    $modelo = $_POST['modelo'];
    $numeroSerie = $_POST['numeroSerie'];
    $marca = $_POST['marca'];
    $tipo = $_POST['tipo'];
    $tipoMemoria = $_POST['tipoMemoria'];
    $memoria = $_POST['memoria'];
    $procesador = $_POST['procesador'];
    $discoDuroMecanico = $_POST['discoMecanico'];
    $discoSolido = $_POST['discoSolido'];
    $tamanoSolido = $_POST['tamanoSolido'];
    $tamanoMecanico = $_POST['tamanoMecanico'];
    $tarjetaGrafica = $_POST['tarjetaGrafica'];
    $fechaAsignacion = $_POST['fechaAsignacion'];
    $fechaUltimoFormateo = $_POST['fechaUltimoFormateo'];
    $observaciones = $_POST['observaciones'];
    $hdd = false;
    $ssd = false;
    if($discoDuroMecanico == 'Si'){
        $hdd = true;
    }
    if($discoSolido == 'Si'){
        $ssd = true;
    }

    $query = "UPDATE equipo SET numeroSerie = '$numeroSerie', modelo = '$modelo', fechaAsignacionEquipo = '$fechaAsignacion', ultimaFechaFormateo = '$fechaUltimoFormateo', procesador = '$procesador',
    memoria = '$memoria', tipoMemoria = '$tipoMemoria', discoDuroSSD = '$ssd', discoDuroMecanico = '$hdd', tamañoSSD = '$tamanoSolido', tamañoDD = '$tamanoMecanico', tarjetaGrafica = '$tarjetaGrafica', 
    marca = '$marca', tipo = '$tipo', observaciones = '$observaciones' WHERE Equipos_idEquipos = '$idEquipo'";

    $consulta= $conexion->query($query);

    if($consulta){
        header('Location:../vistas/vistaEquipo.php?id='.$idEquipo.'');
    }else{
        echo "Error al insertar en la base de datos.";
    }
}

?>