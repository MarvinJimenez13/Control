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

  <div style=" margin-left:380px; margin-top:100px;">
    <h2>Inicio de Sesión</h2>
  </div>

<!--Formulario de Inicio-->
  <div class="container"  style="margin-top:50px;">
    <form style="width: 50%; margin-left:300px" method="post" action="back/ingresar.php">
      <div class="form-group">
        <label for="exampleInputEmail1">Correo:</label>
        <input type="email" name="correo" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Ingresa tu correo">
      </div>
      <div class="form-group">
        <label for="exampleInputPassword1">Contraseña:</label>
        <input type="password" name="contrasena" class="form-control" id="exampleInputPassword1" placeholder="Ingresa tu Contraseña">
      </div>
      <button type="submit" class="btn btn-primary" name="ingresar">Ingresar</button>
    </form>
<!--Fin Formulario de Inicio-->

    <!--Función para mostrar error al iniciar sesión.-->
    <?php
      function check(){
        if(isset($_GET['error'])){
          echo "display:block";
        }else if(!isset($_GET['error'])){
          echo "display:none";
        }
      }
     ?>
     <!--Fin de función-->
    <div class="alert alert-danger" role="alert" style="width: 50%; margin-left:300px; <?php check(); ?>">
      Verifica tu usuario y/o contraseña.
    </div>
  </div>
</body>
</html>
