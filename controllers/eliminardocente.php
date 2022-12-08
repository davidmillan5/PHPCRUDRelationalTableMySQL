<?php
if (!isset($_GET['idDocente'])) {
  header('Location: ../index.php?mensaje=error');
  exit();
}

include '../model/connection.php';
$idDocente = $_GET['idDocente'];


$sentencia = $bd->prepare("DELETE FROM docentes where idDocente = ?;");
$resultado = $sentencia->execute([$idDocente]);

if ($resultado === TRUE) {
  header('Location: ../index.php?mensaje=eliminado');
} else {
  header('Location: ../index.php?mensaje=error');
}
