<?php
//print_r($_POST);
if (
  empty($_POST["oculto"]) || empty($_POST["txtPrograma"])
  || empty($_POST["txtNombreModulo"]) || empty($_POST["numCreditos"])
  || empty($_POST["numPrecio"])
) {

  header('Location: ../cruddocentesbd/modulos.php?mensaje=falta');
  exit();
}

include_once '../model/connection.php';
$programa = $_POST["txtPrograma"];
$nombreModulo = $_POST["txtNombreModulo"];
$creditos = $_POST["numCreditos"];
$precio = $_POST["numPrecio"];


$sentencia = $bd->prepare("INSERT INTO modulos(Programa,NombreModulo,Creditos,Precio) VALUES (?,?,?,?);");
$resultado = $sentencia->execute([$programa, $nombreModulo, $creditos, $precio]);

if ($resultado === TRUE) {
  header('Location: ../modulos.php?mensaje=registrado');
} else {
  header('Location: ../modulos.php?mensaje=error');
  exit();
}
