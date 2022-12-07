<?php
//print_r($_POST);
if (
  empty($_POST["oculto"]) || empty($_POST["txtApellido"])
  || empty($_POST["txtNombre"]) || empty($_POST["txtDireccion"])
  || empty($_POST["txtCorreo"]) || empty($_POST["numCelular"])
  || empty($_POST["txtMunicipio"])
) {

  header('Location: ../cruddocentesbd/index.php?mensaje=falta');
  exit();
}

include_once '../model/connection.php';
$apellido = $_POST["txtApellido"];
$nombre = $_POST["txtNombre"];
$direccion = $_POST["txtDireccion"];
$correo = $_POST["txtCorreo"];
$celular = $_POST["numCelular"];
$municipio = $_POST["txtMunicipio"];

$sentencia = $bd->prepare("INSERT INTO docentes(Apellidos,Nombre,Direccion,Correo,Celular,Municipio) VALUES (?,?,?,?,?,?);");
$resultado = $sentencia->execute([$apellido, $nombre, $direccion, $correo, $celular, $municipio]);

if ($resultado === TRUE) {
  header('Location: ../index.php?mensaje=registrado');
} else {
  header('Location: ../index.php?mensaje=error');
  exit();
}
