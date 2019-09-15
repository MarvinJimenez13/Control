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


<!--Nombre y Características-->
    <div class="container text-center"  style="margin-top:-100px;">
      <h1><?php modeloMarca(); ?></h1>
    </div>
    <br>

    <div class="container "  style="">
      <h3>Características del Equipo</h3>
      <hr>
      <?php verCaracteristicas(); ?>
    </div>
<!--Fin Nombre y Características-->

    <div class="container text-center">
      <form method="post" action="../back/eliminarEquipo.php?id= <?php if(isset( $_GET['id'])){$id = $_GET['id']; echo $id; };?>">
        <button class="btn btn-danger" name="eliminarEquipo">Eliminar Equipo</button>
      </form>
        <button class="btn btn-success" onclick="ver('registrarEquipo', 'cancelarRegistro', 'guardarEquipo')">Editar</button>
      </div>
    <br>

  <!--Formulario para editar equipos-->
  <div class="container">
    <div class="container text-center">
      <form id="registrarEquipo" method="post" action="../back/registrarEquipo.php?id= <?php if(isset( $_GET['id'])){$id = $_GET['id']; echo $id; };?>">
        <?php editarEquipo(); ?>
        <div class="text-center" id="guardarEquipo">
          <button class="btn btn-success"  name="editarEquipo">Guardar</button>
        </div>
      </form>
      <div class="container" id="cancelarRegistro">
        <a href="#equiposRegistrados"><button class="btn btn-danger" onclick="ocultar('cancelarRegistro', 'registrarEquipo', 'guardarEquipo')">Cancelar</button></a>
       </div>
    </div>
  </div>

  <!--Fin formulario-->

    <script src="../assets/js/formulario.js"></script>
</body>
</html>