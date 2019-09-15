<?php

//Funcion general para ver nombre del Admin.
  function nombreAdmin(){
    echo $_SESSION['usuario'];
  }

  //Funciones verEquipos y verFunciones de Usuarios.
  function verPerifericosUsuarios(){
    include 'config.php';

    $idPersona = $_GET['id'];
    $query = "SELECT perifericos.idPeriferico, perifericos.marca, perifericos.numeroSerie, tipoperiferico.descripcion
     FROM perifericos, tipoperiferico  WHERE (perifericos.Personas_idPersonas = '$idPersona' AND perifericos.TipoPeriferico_idTipoPeriferico = tipoperiferico.idTipoPeriferico)";


     $consulta = $conexion->query($query);
    if($consulta){
      while($row = mysqli_fetch_array($consulta)){
        echo '<div class="card text-center" style="width: 18rem; margin-left: 185px;">
                <div class="card-body">
                  <h5 class="card-title">'.$row['descripcion'].'-'.$row['marca'].'-'.$row['numeroSerie'].'</h5>
                  <form action="../back/desvincular.php?idPeriferico='.$row['idPeriferico'].'&idPersona='.$idPersona.'" method="post">
                    <button class="btn btn-warning" name="desvincularPeriferico">Desvincular</button>
                  </form>
                </div>
              </div>';
     }
    }else{
      echo "Error en la consulta";
    }
    
  }
  function verEquiposUsuarios(){
    include 'config.php';

    $idPersona = $_GET['id'];
    $query = "SELECT Equipos_idEquipos, marca, modelo, numeroSerie FROM equipo WHERE Personas_idPersonas = '$idPersona'";


     $consulta = $conexion->query($query);
    if($consulta){
      while($row = mysqli_fetch_array($consulta)){
        echo '<div class="card text-center" style="width: 18rem; margin-left: 185px;">
                <div class="card-body">
                  <h5 class="card-title">'.$row['marca'].'-'.$row['modelo'].'-'.$row['numeroSerie'].'</h5>
                  <form action="../back/desvincular.php?idEquipo='.$row['Equipos_idEquipos'].'&idPersona='.$idPersona.'" method="post">
                    <button class="btn btn-warning" name="desvincularEquipo">Desvincular</a>
                  </form>
                </div>
              </div>';
     }
    }else{
      echo "Error en la consulta";
    }
    
  }

  //Funciones Personas.      
  function verEquiposPersona(){
    include 'config.php';

    $query = "SELECT * FROM equipo WHERE Personas_idPersonas IS NULL";
    $consulta = $conexion->query($query);

    if($consulta){
      while($row = mysqli_fetch_array($consulta)){
      echo '<option value="'.$row['Equipos_idEquipos'].'">'.$row['modelo'].'-'.$row['marca'].'-'.$row['numeroSerie'].'</option>';
      }
    }else{
      echo "Error en la consulta";
    }
  }

  function verPerifericosPersona(){
    include 'config.php';

    $query = "SELECT * FROM perifericos WHERE Personas_idPersonas IS NULL";
    $consulta = $conexion->query($query);

    if($consulta){
      while($row = mysqli_fetch_array($consulta)){

        echo '<option value="'.$row['idPeriferico'].'">'.$row['modelo'].'-'.$row['marca'].'-'.$row['numeroSerie'].'</option>';

      }
    }else{
      "Error en la consulta";
    }
  }
  
  function nombrePersona(){
      include 'config.php';

      if(isset($_GET['id'])){
        $id = $_GET['id'];

        $query = "SELECT nombre FROM personas WHERE idPersonas = '$id'";
        $consulta = $conexion->query($query);
        $nombre = mysqli_fetch_array($consulta);
        echo $nombre['nombre'];
      }
  }

  function verPersonas(){
    include 'config.php';
    $query = "SELECT * FROM personas";
    $consulta = $conexion->query($query);

    while ($row = mysqli_fetch_array($consulta)) {
      echo '<div class="card text-center" style="width: 18rem; margin-left: 185px;">
              <div class="card-body">
                <h5 class="card-title">'.$row['nombre'].'</h5>
                <a href="vistas/vistaPersona.php?id='.$row['idPersonas'].'" class="btn btn-primary">Ver</a>
              </div>
            </div>';
    }

  }

  //Funciónes Equipos.
  function modeloMarca(){
      include 'config.php';

      if(isset($_GET['id'])){
        $id = $_GET['id'];

        $query = "SELECT modelo, marca FROM equipo WHERE Equipos_idEquipos = '$id'";
        $consulta = $conexion->query($query);
        if($consulta){
          $nombre = mysqli_fetch_array($consulta);
          echo $nombre['marca'].' - '. $nombre['modelo'];
        }
       
      }
  }

  function verCaracteristicas(){
      include 'config.php';

      if(isset($_GET['id'])){
        $id = $_GET['id'];

        $query = "SELECT * FROM equipo WHERE Equipos_idEquipos = '$id'";
        $consulta = $conexion->query($query);
        if($consulta){
          while($row = mysqli_fetch_array($consulta)){
            echo '
            <h5>Persona Asignada: '.verPersonaEquipo($row['Personas_idPersonas']).'</h5>
            <br>
            <h5>Número de Serie: '.$row['numeroSerie'].'</h5>
            <h5>Modelo: '.$row['modelo'].'</h5>
            <h5>Marca: '.$row['marca'].'</h5>
            <h5>Tipo (Descripción): '.$row['tipo'].'</h5>
            <h5>Fecha de Asignación: '.$row['fechaAsignacionEquipo'].'</h5>
            <h5>Fecha de último formateo: '.$row['ultimaFechaFormateo'].'</h5>
            <h5>Procesador: '.$row['procesador'].'</h5>
            <h5>Memoria: '.$row['memoria'].'</h5>
            <h5>Tipo de memoria:'.$row['tipoMemoria'].'</h5>
            <h5>SSD: '.$row['discoDuroSSD'].'</h5>
            <h5>Tamaño SSD: '.$row['tamañoSSD'].'</h5>
            <h5>HDD: '.$row['discoDuroMecanico'].'</h5>
            <h5>Tamaño HDD: '.$row['tamañoDD'].'</h5>
            <h5>Tajeta Gráfica: '.$row['tarjetaGrafica'].'</h5>
            <br>
            <h5>Observaciones: '.$row['observaciones'].'</h5>';
          }
        }else{
          echo "Error en la consulta";
        }
      }
  }

  function verPersonaEquipo($idPersona){
    include 'config.php';

    $query = "SELECT nombre FROM personas WHERE idPersonas = '$idPersona'";
    $consulta = $conexion->query($query);
    
    if($consulta){
      $row = mysqli_fetch_array($consulta);
      return $row['nombre'];
    }else{
      echo "Error en la consulta.";
    }
  }

  function verEquipos(){
    include 'config.php';
    $query = "SELECT * FROM equipo";
    $consulta = $conexion->query($query);

    while($row = mysqli_fetch_array($consulta)){
      echo '  <div class="card text-center" style="width: 18rem; margin-left: 185px;">
                <div class="card-body">
                   <h5 class="card-title">'.$row['tipo'].'-'.$row['modelo'].'</h5>
                    <a href="vistas/vistaEquipo.php?id='.$row['Equipos_idEquipos'].'" class="btn btn-primary">Ver</a>
                </div>
              </div>';
    }

  }
 
  function editarEquipo(){
    include 'config.php';
    $idEquipo = $_GET['id'];

    $query = "SELECT * FROM equipo WHERE Equipos_idEquipos = '$idEquipo'";
    $consulta = $conexion->query($query);

    if($consulta){
      $row = mysqli_fetch_array($consulta);
      $hdd = "selected";
      $ssd = "selected";

      if($row['discoDuroMecanico'] == 1){
        $hdd = "<option selected>Si</option>
                <option>No</option>";       
      }else{
        $hdd = "<option>Si</option>
                <option selected>No</option>"; 
      }

      if($row['discoDuroSSD'] == 1){
        $ssd = "<option selected>Si</option>
                  <option>No</option>";        
      }else{
        $ssd = "<option>Si</option>
                  <option selected>No</option>";
      }


      echo '<input class="form-control" type="text" placeholder="Modelo" name="modelo" value="'.$row['modelo'].'" required>
    <br>
    <input class="form-control" type="text" placeholder="Número de Serie" name="numeroSerie" value="'.$row['numeroSerie'].'" required>
    <br>
    <input class="form-control" type="text" placeholder="Marca" name="marca" value="'.$row['marca'].'" required>
    <br>
    <input class="form-control" type="text" placeholder="Tipo (Descripción)" name="tipo" value="'.$row['tipo'].'" required>
    <br>
    <input class="form-control" type="text" placeholder="Tipo de Memoria" name="tipoMemoria" value="'.$row['tipoMemoria'].'" required>
    <br>
    <input class="form-control" type="text" placeholder="Memoria" name="memoria" value="'.$row['memoria'].'" required>
    <br>
    <input class="form-control" type="text" placeholder="Procesador" name="procesador" value="'.$row['procesador'].'" required>
    <br>
    <div class="form-group">
      <label for="exampleFormControlSelect1">Disco Duro Mecánico</label>
      <select class="form-control" id="exampleFormControlSelect1" value="'.$hdd.'" name="discoMecanico">
        '.$hdd.'
      </select>
    </div>
    <br>
    <div class="form-group">
      <label for="exampleFormControlSelect1">Disco Duro de Estado Sólido</label>
      <select class="form-control" id="exampleFormControlSelect1" value="'.$ssd.'" name="discoSolido">
        '.$ssd.'
      </select>
    </div>
    <br>
    <input class="form-control" type="text" placeholder="Tamaño Disco Duro Mecánico" value="'.$row['tamañoDD'].'" name="tamanoMecanico">
    <br>
    <input class="form-control" type="text" placeholder="Tamaño Disco Duro de Estado Sólido" value="'.$row['tamañoSSD'].'" name="tamanoSolido">
    <br>
    <input class="form-control" type="text" placeholder="Tarjeta Gráfica" name="tarjetaGrafica" value="'.$row['tarjetaGrafica'].'" required>
    <br>
    <label>Fecha de Asiganción</label>
    <input class="form-control" type="date" placeholder="Fecha de Asiganción" value="'.$row['fechaAsignacionEquipo'].'" name="fechaAsignacion" >
    <br>
    <label>Fecha de Último Formateo</label>
    <input class="form-control" type="date" placeholder="Fecha de Último Formateo" value="'.$row['ultimaFechaFormateo'].'" name="fechaUltimoFormateo">
    <br>
    <input class="form-control" type="text" placeholder="Observaciones" value="'.$row['observaciones'].'" name="observaciones">
    <br>';
    }

    
  }

  //Funciones Perifericos
  function nombrePeriferico(){
    include 'config.php';

    if(isset($_GET['id'])){
      $id = $_GET['id'];

      $query = "SELECT tipoperiferico.descripcion, perifericos.marca, perifericos.modelo FROM tipoperiferico, perifericos
       WHERE perifericos.idPeriferico = '$id' AND tipoperiferico.idTipoPeriferico = perifericos.TipoPeriferico_idTipoPeriferico";
      $consulta = $conexion->query($query);

      if($consulta){
        $row = mysqli_fetch_array($consulta);
        echo $row[0].'-'.$row[1].'-'.$row[2];
      }else{
        echo "Error en la consulta";
      }

  }
}

  function caracteristicasPerif(){
    include 'config.php';

    if(isset($_GET['id'])){
      $id = $_GET['id'];
      $query = "SELECT * FROM perifericos WHERE idPeriferico = '$id'";
      $consulta = $conexion->query($query);
      $row = mysqli_fetch_array($consulta);

      echo '
            <h5>Persona asignada: '.verPersonaPerif($row['Personas_idPersonas']).'</h5>
            <br>
            <h5>Tipo de perfiferico: '.tipo($row['TipoPeriferico_idTipoPeriferico']).'</h5>
            <h5>Número de Serie: '.$row['numeroSerie'].'</h5>
            <h5>Fecha de Asignación: '.$row['fechaAsignacionPeriferico'].'</h5>
            <h5>Marca: '.$row['marca'].'</h5>
            <h5>Modelo: '.$row['modelo'].'</h5>';
    }else{
      echo "Error en la consulta";
    }
  }

  function verPersonaPerif($idPersona){
    include 'config.php';

    $query = "SELECT nombre FROM personas WHERE idPersonas = '$idPersona'";
    $consulta = $conexion->query($query);
    
    if($consulta){
      $row = mysqli_fetch_array($consulta);
      return $row['nombre'];
    }else{
      echo "Error en la consulta.";
    }
  }

  function opcionesTiposPerif(){
    include 'config.php';
    $query = "SELECT *FROM tipoperiferico";
    $consulta = $conexion->query($query);

    while($row = mysqli_fetch_array($consulta)){
      echo '<option>'.$row['idTipoPeriferico'].'/'.$row['descripcion'].'</option>';
       
    }
  }

  function opcionesTiposPerif2(){
    include 'config.php';
    $query = "SELECT * FROM tipoperiferico";
    $consulta = $conexion->query($query);
    $str = "";
    while($row = mysqli_fetch_array($consulta)){
      $str .= '<option>'.$row['idTipoPeriferico'].'/'.$row['descripcion'].'</option>';
       
    }
    return $str;
  }

  function tipo($idTipo){
    include 'config.php';
    $query = "SELECT * FROM tipoperiferico WHERE idTipoPeriferico = '$idTipo'";
    $consulta = $conexion->query($query);

    if($consulta){
      $row = mysqli_fetch_array($consulta);
      return $row['descripcion'];
    }
  }

  function verPerifericos(){
    include 'config.php';
    $query = "SELECT * FROM perifericos";
    $consulta = $conexion->query($query);

    while($row = mysqli_fetch_array($consulta)){
      $tipo = tipo($row['TipoPeriferico_idTipoPeriferico']);
      echo '<div class="card text-center" style="width: 19rem; margin-left: 50px;">
              <div class="card-body">
                <h5 class="card-title" style="margin-left:-60px">'.$tipo.'-'.$row['numeroSerie'].'</h5>
                <a href="vistas/vistaPeriferico.php?id='.$row['idPeriferico'].'" class="btn btn-primary" style="float:right; margin-top:-38px">Ver</a>
              </div>
            </div>';
    }
  }

  function verTiposPerifericos(){
    include 'config.php';
    $query = "SELECT *FROM tipoperiferico";
    $consulta = $conexion->query($query);

    while($row = mysqli_fetch_array($consulta)){
      echo '<div class=" text-center" style="width: 18rem; margin-left: 50px;">
              <div class="">
                <h5 class="">'.$row['descripcion'].'</h5>
                <form method="post" action="back/eliminarPeriferico.php" style="float:right; margin-top: -38px">
                  <input style="display:none" name="tipo" value="'.$row['idTipoPeriferico'].'"></input>
                  <button class="btn btn-danger" name="eliminarTipo">Eliminar</button>
                </form>
              </div>
            </div> <br><br>';
    }
  }

  function editarPerifericos(){
    include 'config.php';
    $idPeriferico = $_GET['id'];

    $query = "SELECT * FROM perifericos WHERE idPeriferico = '$idPeriferico'";
    $consulta = $conexion->query($query);
     
    if($consulta){
      $row = mysqli_fetch_array($consulta);

     echo '<label for="exampleFormControlSelect1">Tipo de Periférico</label>
      <select class="form-control" id="exampleFormControlSelect1" name="tipoPeriferico">
       '.opcionesTiposPerif2().'
      </select>
    <br>
    <input class="form-control" type="text" placeholder="Modelo" name="modeloPeriferico" value="'.$row['modelo'].'" required>
    <br>
    <input class="form-control" type="text" placeholder="Marca" name="marcaPeriferico" value="'.$row['marca'].'" required>
    <br>
    <input class="form-control" type="text" placeholder="Número de Serie" name="seriePeriferico" value="'.$row['numeroSerie'].'" required>
    <br>
    <label>Fecha de Asiganción</label>
    <input class="form-control" type="date" placeholder="Fecha de Asiganción" value="'.$row['fechaAsignacionPeriferico'].'" name="fechaAsignacionPerif" >';
    }
  }


  //Función ver ID del objeto.
  function verID($idObj){
    $id = $idObj;
    echo $id;
  }

  //Funciones CARTA
  function verNombreCarta(){
    include 'config.php';
    $id = $_GET['id'];

    $query = "SELECT  nombre FROM personas WHERE idPersonas = '$id'";
    $consulta = $conexion->query($query);

    if($consulta){
      $row = mysqli_fetch_array($consulta);
      return $row['nombre'];
    }else{
      return "Consulta erronea";
    }
  }

  function verCorreoCarta(){
    include 'config.php';
    $id = $_GET['id'];

    $query = "SELECT correo FROM personas WHERE idPersonas = '$id'";
    $consulta = $conexion->query($query);

    if($consulta){
      $row = mysqli_fetch_array($consulta);
      return $row['correo'];
    }else{
      return "Consulta erronea";
    }
  }
  
  function fecha(){
    date_default_timezone_set('America/Mexico_City');
    return date(' d F Y h:i:s A');
  }

  function whileC($consulta){
    while( $row = mysqli_fetch_array($consulta)){
      return '  <tr>
      <td>'.$row['tipo'].'</td>
      <td>'.$row['marca'].'</td>
      <td>'.$row['modelo'].'</td>
      <td>'.$row['numeroSerie'].'</td>
      </tr>';
    }
  }

  function returnTable(){
    return '</table>';
  }  

  function tabla(){
    return  '<table border="1" style="width: 100%;">
    <tr>
        <td>Equipo</td>
        <td>Marca</td>
        <td>Modelo</td>
        <td>No. De Serie</td>
    </tr>';
  }


  function tablaEquipos(){
    include 'config.php';

    $id = $_GET['id'];
    $query = "SELECT marca, modelo, numeroSerie, tipo FROM equipo WHERE Personas_idPersonas = '$id'";
    $consulta = $conexion->query($query);

    if($consulta){
      while( $row = mysqli_fetch_array($consulta)){
        $str .= '<tr>
        <td>'.$row['tipo'].'</td>
        <td>'.$row['marca'].'</td>
        <td>'.$row['modelo'].'</td>
        <td>'.$row['numeroSerie'].'</td>
        </tr>';
      }

      return $str;
    }else{
      return "Error al generar consulta";
    }

  }

  function tablaP(){
    return  '<table border="1" style="width: 100%;">
    <tr>
        <td>Periférico</td>
        <td>Marca</td>
        <td>Modelo</td>
        <td>No. De Serie</td>
    </tr>'
    ;
  }

  function tablaPerifericos(){
    include 'config.php';

    $id = $_GET['id'];
    $query = "SELECT * FROM perifericos WHERE Personas_idPersonas = '$id'";
    $consulta = $conexion->query($query);

    if($consulta){
      while($row = mysqli_fetch_array($consulta)){
        $str .='<tr>
        <td>'.tipo($row['TipoPeriferico_idTipoPeriferico']).'</td>
        <td>'.$row['marca'].'</td>
        <td>'.$row['modelo'].'</td>
        <td>'.$row['numeroSerie'].'</td>
        </tr>';
        
      }
     return $str;
    }else{
      return "Error al generar consulta";
    }

  }
  
 ?>
