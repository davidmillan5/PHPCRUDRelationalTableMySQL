<?php
if (!isset($_GET['idModulo'])) {
  header('Location: ../modulos.php?mensaje=error');
  exit();
}

include '../model/connection.php';
$idModulo = $_GET['idModulo'];


$sentencia = $bd->prepare("DELETE FROM modulos where idModulo = ?;");
$resultado = $sentencia->execute([$idModulo]);

if ($resultado === TRUE) {
  header('Location: ../modulos.php?mensaje=eliminado');
} else {
  header('Location: ../modulos.php?mensaje=error');
}
