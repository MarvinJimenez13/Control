<?php
  session_start();
  include 'back/config.php';
  include 'back/funciones.php';
  if(!isset($_SESSION['usuario'])){
    header('Location:index.php');
  }
 ?>
<!DOCTYPE html>
<html>
<head>
  <title>Control</title>
  <link type="text/css" rel="stylesheet" href="css/styles.css">
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
      <a href="personas.php"><button class="dropdown-item" type="button">Personas</button></a>
      <a href="equipos.php"><button class="dropdown-item" type="button">Equipos</button></a>
      <a href="perifericos.php"><button class="dropdown-item" type="button">Periféricos</button></a>
    </div>
  </div>
  <div style="margin:20px">
    <button class="btn btn-danger">Cerrar Sesión</button>
  </div>
<!--Fin Acciones Admin-->

  <!--Tipos de Periféricos-->
  <div class="container" style="margin-top:-150px;">
    <div class="text-center">
      <h3>Tipos de Periféricos</h3>
    </div>
    <div class="row">
      <?php verTiposPerifericos(); ?>
    </div>
    <br>
    <div class="text-center">
      <button class="btn btn-primary" onclick="ver('registrarTipo', 'cancelarRegistroTipo', 'guardarTipo')">Registrar Nuevo Tipo</button>
    </div>
    <br>
  </div>
  <!--Fin Tipos de Periféricos-->

    <!--Formulario para agregar Tipos de Periféricos-->
    <div class="container">
    <div class="container text-center">
      <form id="registrarTipo" action="back/registrarPerifericos.php" method="post">
        <input class="form-control" type="text" placeholder="Modelo" name="tipoPeriferico" required>
        <br>
        <div class="text-center" id="guardarTipo">
          <button class="btn btn-success" name="guardarTipo">Guardar</button>
        </div>
      </form>
    </div>
  </div>
  <div class="container text-center" id="cancelarRegistroTipo">
    <button class="btn btn-danger" onclick="ocultar('cancelarRegistroTipo', 'registrarTipo', 'guardarTipo')">Cancelar</button>
  </div>
  <!--Fin formulario-->

  <hr>
  <br>
  <br>
  <!--Perifericos Registrados-->
  <div class="container" style="margin-top:-50px;">
    <div class="text-center">
      <h3>Perifericos registrados</h3>
    </div>
    <div class="row">
      <?php verPerifericos(); ?>
    </div>
    <br>
    <div class="text-center">
      <button class="btn btn-primary" onclick="ver('registrarPeriferico', 'cancelarRegistro', 'guardarPeriferico')">Registrar Nuevo Periferico</button>
    </div>
    <br>
  </div>
  <!--Fin Perifericos registrados-->

  <!--Formulario para agregar perifericos-->
  <div class="container">
    <div class="container text-center">
      <form id="registrarPeriferico" method="post" action="back/registrarPerifericos.php">
      <label for="exampleFormControlSelect1">Tipo de Periférico</label>
          <select class="form-control" id="exampleFormControlSelect1" name="tipoPeriferico">
           <?php opcionesTiposPerif(); ?>
          </select>
        <br>
        <input class="form-control" type="text" placeholder="Modelo" name="modeloPeriferico" required>
        <br>
        <input class="form-control" type="text" placeholder="Marca" name="marcaPeriferico" required>
        <br>
        <input class="form-control" type="text" placeholder="Número de Serie" name="seriePeriferico" required>
        <br>
        <label>Fecha de Asiganción</label>
        <input class="form-control" type="date" placeholder="Fecha de Asiganción" name="fechaAsignacionPerif" >
        <div class="text-center" id="guardarPeriferico">
          <button class="btn btn-success" name="guardarPeriferico">Guardar</button>
        </div>
      </form>
    </div>
  </div>
  <div class="container text-center" id="cancelarRegistro">
    <button class="btn btn-danger" onclick="ocultar('cancelarRegistro', 'registrarPeriferico', 'guardarPeriferico')">Cancelar</button>
  </div>
  <!--Fin formulario-->
  <script src="assets/js/formulario.js"></script>
</body>
</html>
