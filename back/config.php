<?php
$DB_HOST = "localhost";
$DB_USUARIO = "root";
$DB_CONTRASENA = "";
$DB = "control";
$conexion= mysqli_connect($DB_HOST, $DB_USUARIO, $DB_CONTRASENA);
if(mysqli_connect_errno()){
echo "Error en la conexión";
echo mysqli_connect_error();
}
mysqli_set_charset($conexion, "UTF8");
mysqli_select_db($conexion, $DB) or die ("Error en la conexión");
?>
