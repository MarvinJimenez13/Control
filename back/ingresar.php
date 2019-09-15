<?php
session_start();
include 'config.php';

if(isset($_POST['ingresar'])){

  if($_POST['correo'] != "" && $_POST['contrasena'] != ""){
    $correo = $_POST['correo'];
    $contra = $_POST['contrasena'];

    $query = "SELECT * FROM admins WHERE correo = '$correo' AND contrasena = '$contra'";
    $consulta = $conexion->query($query);
    $contar = mysqli_num_rows($consulta);

    if($contar == 1){
      $row = mysqli_fetch_array($consulta);
      $_SESSION['usuario'] = $row['nombre'];
      header('Location:../personas.php');
    }else{
      header('Location:../index.php?error=true');
    }
  }else{
    header('Location:../index.php?error=true');
  }

}

?>
