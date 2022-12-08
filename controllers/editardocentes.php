<?php include '../template/header.php' ?>

<?php

if (!isset($_GET['idDocente'])) {
  header('Location: ../index.php?mensaje=error');
  exit();
}

include_once '../model/connection.php';
$codigo = $_GET['idDocente'];

$sentencia = $bd->prepare("select * from docentes where idDocente = ?;");
$sentencia->execute([$codigo]);
$docente = $sentencia->fetch(PDO::FETCH_OBJ);
//print_r($persona);
?>


<div class="container mt-5 mb-5">
  <div class="row justify-content-center">
    <div class="col-md-4">
      <div class="card">
        <div class="card-header">
          Editar datos:
          <form class="p-4" method="POST" action="/cruddocentesbd/controllers/editarprocesodocente.php">
            <div class="mb-3">
              <label class="form-label">Apellidos: </label>
              <input type="text" class="form-control" name="txtApellido" required value="<?php echo $docente->Apellidos; ?>">
            </div>
            <div class="mb-3">
              <label class="form-label">Nombre: </label>
              <input type="text" class="form-control" name="txtNombre" required value="<?php echo $docente->Nombre; ?>">
            </div>
            <div class="mb-3">
              <label class="form-label">Direccion: </label>
              <input type="text" class="form-control" name="txtDireccion" required value="<?php echo $docente->Direccion; ?>">
            </div>
            <div class="mb-3">
              <label class="form-label">Correo: </label>
              <input type="text" class="form-control" name="txtCorreo" required value="<?php echo $docente->Correo; ?>">
            </div>
            <div class="mb-3">
              <label class="form-label">Celular: </label>
              <input type="number" class="form-control" name="numCelular" required value="<?php echo $docente->Celular; ?>">
            </div>
            <div class="mb-3">
              <label class="form-label">Municipio: </label>
              <input type="text" class="form-control" name="txtMunicipio" required value="<?php echo $docente->Municipio; ?>">
            </div>
            <div class="d-grid">
              <input type="hidden" name="idDocente" value="<?php echo $docente->idDocente; ?>">
              <input type="submit" class="btn btn-primary" value="Editar">
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>



<?php include '../template/footer.php' ?>