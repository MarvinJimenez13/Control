<?php 
include 'config.php';

if(isset($_POST['eliminarTipo'])){
    $idTipo = $_POST['tipo'];
    $query = "DELETE FROM tipoperiferico WHERE (idTipoPeriferico = '$idTipo')";
    $consulta = $conexion->query($query);
    
    if($consulta){
        
        header('Location: ../perifericos.php'); 
    }else{
        echo  "<script> var replica = confirm('No puedes eliminar un tipo de periférico que está en uso.');
                    if(replica){ document.location = '../perifericos.php'}else{
                        document.location = '../perifericos.php'}
                </script>";

    }
}

if(isset($_POST['eliminarPeriferico'])){
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $query = "DELETE FROM perifericos WHERE idPeriferico = '$id'";
        $consulta = $conexion->query($query);

        if($consulta){
            header('Location: ../perifericos.php');
        }else{
            echo "Error en la consulta";
        }
    }
}

?>