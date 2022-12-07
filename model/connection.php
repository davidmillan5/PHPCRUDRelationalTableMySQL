<?php
$password = "C3s4r18099593";
$user = "root";
$bdname = "docentes";

try {
  $bd = new PDO(
    'mysql:host=localhost;
		dbname=' . $bdname,
    $user,
    $password,
    array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8")
  );
} catch (Exception $e) {
  echo "Problema con la conexion: " . $e->getMessage();
}
