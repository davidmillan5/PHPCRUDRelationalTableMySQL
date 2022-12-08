<?php

print_r($_POST);


if (!isset($_POST['idModulo'])) {
  header('Location: ../modulos.php?mensaje=error');
}

include '../model/connection.php';

$idModulo = $_POST["idModulo"];
$programa = $_POST["txtPrograma"];
$nombreModulo = $_POST["txtNombreModulo"];
$creditos = $_POST["numCreditos"];
$precio = $_POST["numPrecio"];


$sentencia = $bd->prepare("UPDATE modulos SET Programa = ?, NombreModulo = ?, Creditos = ?, Precio = ? where idModulo =?;");
$resultado = $sentencia->execute([$programa, $nombreModulo, $creditos, $precio,  $idModulo]);


if ($resultado === TRUE) {
  header('Location: ../modulos.php?mensaje=editado');
} else {
  header('Location: ../modulos.php?mensaje=error');
  exit();
}
