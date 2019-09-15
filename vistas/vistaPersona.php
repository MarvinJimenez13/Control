<?php
  session_start();
  include '../back/config.php';
  include '../back/funciones.php';
  if(!isset($_SESSION['usuario'])){
    header('Location:../index.php');
  }
 ?>
<!DOCTYPE html>
<html>
<head>
  <title>Control</title>
  <link type="text/css" rel="stylesheet" href="../css/styles.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</head>
<body>
<!--Acciones Admin-->
  <div class="card" style="width: 18rem;">
  <div class="card-body">
    <h5 class="card-title">Bienvenido</h5>
    <h6 class="card-subtitle mb-2 text-muted"><?php nombreAdmin(); ?></h6>
    <a href="#" class="card-link" onclick="cambioContraseña()">Cambiar Contraseña</a>
  </div>
    <form id="cambiarContra" method="post" action="cambiarContra.php">
      <div class="form-group" >
        <label>Constraseña Anterior:<label>
        <input class="form-control" name="contraAntigua">
        <label>Constraseña Nueva:</label>
        <input class="form-control" name="contraNueva">
        <label>Repita su contraseña:</label>
        <input class="form-control" name="rectificarContra">
        <button class="btn btn-success" name="guardarContra">Actualizar</button>
      </div>
    </form>
    <button class="btn btn-danger" onclick="ocultarCambioC()" id="btnCancelar">Cancelar</button>
</div>
  <div class="dropdown" style="margin:20px">
    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
      Acciones
    </button>
    <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
      <a href="../personas.php"><button class="dropdown-item" type="button">Personas</button></a>
      <a href="../equipos.php"><button class="dropdown-item" type="button">Equipos</button></a>
      <a href="../perifericos.php"><button class="dropdown-item" type="button">Periféricos</button></a>
    </div>
  </div>
  <div style="margin:20px">
    <button class="btn btn-danger">Cerrar Sesión</button>
  </div>
<!--Fin Acciones Admin-->

<!--Nombre de la Persona-->
    <div class="container text-center"  style="margin-top:-200px;">
      <h1><?php nombrePersona(); ?></h1>
    </div>
    <br>
<!--Fin Nombre Persona-->


<!--Equipos y Perifericos de la Persona-->
    <div class="container text-center"  style="margin-top:;">
      <h3>Equipo/s del Usuario</h3>
      <div class="container"  style="">
        <br>
        <div class="row">
          <?php verEquiposUsuarios(); ?>
        </div>
        <br>
      </div>
    </div>
    <div class="container text-center"  style="margin-top:;">
      <h3>Periférico/s del Usuario</h3>
      <div class="container" style="margin-top:">
        <div class="row">
          <?php verPerifericosUsuarios(); ?>
        </div>
        <br>
      </div>
    </div>
<!--Fin Equipos y Perifericos de la Persona-->
    <hr >

<!--Botones-->
    <div class="container text-center"  style="margin-top:50px;">
      <a href="#vistaP_Equipos"><button class="btn btn-primary" onclick="verEnPersonas('vistaP_Equipos')">Asignar Equipo</button></a>
      <a href="#vistaP_Perfifericos"><button class="btn btn-primary" onclick="verEnPersonas('vistaP_Perfifericos')">Asignar Periférico</button></a>
      <a href="../back/generarCarta.php?id= <?php verID($_GET['id']); ?> "><button class="btn btn-success">Generar Carta</button></a>
      <form method="post" action="../back/eliminarPersona.php?id= <?php if(isset( $_GET['id'])){$id = $_GET['id']; echo $id; };?>">
      <button class="btn btn-danger" name="eliminarPersona">Eliminar Persona</button>
      </form>
    </div>
<!--Fin Botones-->

<!--Registros Ocultos-->
    <div id="vistaP_Equipos" class="container text-center"  style="margin-top:50px;">
      <form method="post" action="../back/registrarEquipo.php?id= <?php verID($_GET['id']); ?>">
        <div class="form-group">
          <label for="exampleFormControlSelect1">Equipos</label>
          <select class="form-control" id="exampleFormControlSelect1" name="equipo">
            <?php verEquiposPersona(); ?>
           </select>
        </div>
        <button class="btn btn-success" name="agregarEquipo">Agregar</button>
      </form>
      <button class="btn btn-danger" onclick="ocultarEnPersonas('vistaP_Equipos')">Cancelar</button>
    </div>

    <div id="vistaP_Perfifericos" class="container text-center"  style="margin-top:50px;">
      <form method="post" action="../back/registrarPerifericos.php?id= <?php verID($_GET['id']); ?>">
        <div class="form-group">
          <label for="exampleFormControlSelect1">Periféricos</label>
          <select class="form-control" id="exampleFormControlSelect1" name="periferico">
            <?php verPerifericosPersona(); ?>
          </select>
         </div>
          <button class="btn btn-success" name="agregarPeriferico">Agregar</button>
      </form>
      <button class="btn btn-danger" onclick="ocultarEnPersonas('vistaP_Perfifericos')">Cancelar</button>
    </div>
<!--Fin Registros Ocultos-->
    <br>
    <script src="../assets/js/formulario.js"></script>
</body>
</html>
