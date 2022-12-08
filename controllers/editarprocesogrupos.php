<?php

print_r($_POST);


if (!isset($_POST['idGrupo'])) {
  header('Location: ../grupos.php?mensaje=error');
}

include '../model/connection.php';

$idGrupo = $_POST["idGrupo"];
$idModulo = $_POST["numIdModulo"];
$idDocente = $_POST["numIdDocente"];
$date = $_POST["date"];
$numEstudiantes = $_POST["numEstudiantes"];
$jornada = $_POST["txtJornada"];


$sentencia = $bd->prepare("UPDATE grupos SET idModulo = ?, idDocente = ?, FechaInicio = ?, NroEstudiantes = ?, Jornada = ? where idGrupo =?;");
$resultado = $sentencia->execute([$idModulo, $idDocente, $date, $numEstudiantes, $jornada, $idGrupo]);


if ($resultado === TRUE) {
  header('Location: ../grupos.php?mensaje=editado');
} else {
  header('Location: ../grupos.php?mensaje=error');
  exit();
}
