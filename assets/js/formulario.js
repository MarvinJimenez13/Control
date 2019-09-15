
//Funciones del formulario de Regsitro Personas, Equipos, Perifericos.
function ver(id1, id2, id3){
  var botonRegistrar = document.getElementById(id1);
  botonRegistrar.style.display = "block";
  var botonCancelar = document.getElementById(id2);
  botonCancelar.style.display = "block";
  var botonGuardar = document.getElementById(id3);
  botonGuardar.style.display = "block";
}

function ocultar(id1, id2, id3){
  var botonCancelar = document.getElementById(id1);
  botonCancelar.style.display = "none";
  var botonRegistrar = document.getElementById(id2);
  botonRegistrar.style.display = "none";
  var botonGuardar = document.getElementById(id3);
  botonGuardar.style.display = "none";
}

//Funciones del formulario Agregar Equipo y Periferico a personas.
function verEnPersonas(id){
  var botonVer = document.getElementById(id);
  botonVer.style.display = "block";
}

function ocultarEnPersonas(id){
  var botonOcultar = document.getElementById(id);
  botonOcultar.style.display = "none";
}

//Cambio de contraseña
function cambioContraseña(){
  var formContra = document.getElementById("cambiarContra");
  formContra.style.display = "block";
  var btnCancelar = document.getElementById("btnCancelar");
  btnCancelar.style.display = "block";
}

function ocultarCambioC(){
  var formContra = document.getElementById("cambiarContra");
  formContra.style.display = "none";
  var btnCancelar = document.getElementById("btnCancelar");
  btnCancelar.style.display = "none";
}
