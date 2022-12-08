<?php
//print_r($_POST);
if (
  empty($_POST["oculto"]) || empty($_POST["numIdModulo"])
  || empty($_POST["numIdDocente"]) || empty($_POST["date"])
  || empty($_POST["numEstudiantes"]) || empty($_POST["txtJornada"])
) {

  header('Location: ../cruddocentesbd/grupos.php?mensaje=falta');
  exit();
}

include_once '../model/connection.php';
$idModulo = $_POST["numIdModulo"];
$idDocente = $_POST["numIdDocente"];
$date = $_POST["date"];
$numEstudiantes = $_POST["numEstudiantes"];
$jornada = $_POST["txtJornada"];

$sentencia = $bd->prepare("INSERT INTO grupos(idModulo,idDocente,FechaInicio,NroEstudiantes,Jornada) VALUES (?,?,?,?,?);");
$resultado = $sentencia->execute([$idModulo, $idDocente, $date, $numEstudiantes, $jornada]);

if ($resultado === TRUE) {
  header('Location: ../grupos.php?mensaje=registrado');
} else {
  header('Location: ../grupos.php?mensaje=error');
  exit();
}
