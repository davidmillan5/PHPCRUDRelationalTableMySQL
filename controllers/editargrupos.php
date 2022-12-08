<?php include '../template/header.php' ?>

<?php

if (!isset($_GET['idGrupo'])) {
  header('Location: ../grupos.php?mensaje=error');
  exit();
}

include_once '../model/connection.php';
$codigo = $_GET['idGrupo'];

$sentencia = $bd->prepare("select * from grupos where idGrupo= ?;");
$sentencia->execute([$codigo]);
$grupo = $sentencia->fetch(PDO::FETCH_OBJ);
//print_r($persona);
?>


<div class="container mt-5 mb-5">
  <div class="row justify-content-center">
    <div class="col-md-4">
      <div class="card">
        <div class="card-header">
          Editar datos:
          <form class="p-4" method="POST" action="/cruddocentesbd/controllers/editarprocesogrupos.php">
            <div class="mb-3">
              <label class="form-label">Id Modulo: </label>
              <input type="number" class="form-control" name="numIdModulo" required value="<?php echo $grupo->idModulo; ?>">
            </div>
            <div class="mb-3">
              <label class="form-label">Id Docente: </label>
              <input type="number" class="form-control" name="numIdDocente" required value="<?php echo $grupo->idDocente; ?>">
            </div>
            <div class="mb-3">
              <label class="form-label">Fecha Inicio: </label>
              <input type="date" class="form-control" name="date" required value="<?php echo $grupo->FechaInicio; ?>">
            </div>
            <div class="mb-3">
              <label class="form-label">Nro de Estudiantes: </label>
              <input type="number" class="form-control" name="numEstudiantes" required value="<?php echo $grupo->NroEstudiantes; ?>">
            </div>
            <div class="mb-3">
              <label class="form-label">Jornada: </label>
              <input type="text" class="form-control" name="txtJornada" required value="<?php echo $grupo->Jornada; ?>">
            </div>
            <div class="d-grid">
              <input type="hidden" name="idGrupo" value="<?php echo $grupo->idGrupo; ?>">
              <input type="submit" class="btn btn-primary" value="Editar">
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>



<?php include '../template/footer.php' ?>