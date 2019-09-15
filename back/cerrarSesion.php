<?php
  session_start();
  if(isset($_POST['cerrarSesion'])){
    //destruimos las sesiones del usuario
    unset($_SESSION['usuario']);
    session_destroy();
    //lo mandamos al login
    header("Location: ../index.php");
  }
 ?>
