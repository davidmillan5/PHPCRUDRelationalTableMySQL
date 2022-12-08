<?php
if (!isset($_GET['idGrupo'])) {
  header('Location: ../grupos.php?mensaje=error');
  exit();
}

include '../model/connection.php';
$idGrupo = $_GET['idGrupo'];


$sentencia = $bd->prepare("DELETE FROM grupos where idGrupo = ?;");
$resultado = $sentencia->execute([$idGrupo]);

if ($resultado === TRUE) {
  header('Location: ../grupos.php?mensaje=eliminado');
} else {
  header('Location: ../grupos.php?mensaje=error');
}
