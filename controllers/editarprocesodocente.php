<?php

print_r($_POST);


if (!isset($_POST['idDocente'])) {
  header('Location: ../index.php?mensaje=error');
}

include '../model/connection.php';

$idDocente = $_POST["idDocente"];
$apellido = $_POST["txtApellido"];
$nombre = $_POST["txtNombre"];
$direccion = $_POST["txtDireccion"];
$correo = $_POST["txtCorreo"];
$celular = $_POST["numCelular"];
$municipio = $_POST["txtMunicipio"];


$sentencia = $bd->prepare("UPDATE docentes.docentes SET Apellidos = ?, Nombre = ?, Direccion = ?, Correo = ?, Celular = ?, Municipio = ? where idDocente =?;");
$resultado = $sentencia->execute([$apellido, $nombre, $direccion, $correo, $celular, $municipio, $idDocente]);


if ($resultado === TRUE) {
  header('Location: ../index.php?mensaje=editado');
} else {
  header('Location: ../index.php?mensaje=error');
  exit();
}
