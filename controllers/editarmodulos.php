<?php include '../template/header.php' ?>

<?php

if (!isset($_GET['idModulo'])) {
  header('Location: ../modulos.php?mensaje=error');
  exit();
}

include_once '../model/connection.php';
$idModulo = $_GET['idModulo'];

$sentencia = $bd->prepare("select * from modulos where idModulo = ?;");
$sentencia->execute([$idModulo]);
$modulo = $sentencia->fetch(PDO::FETCH_OBJ);
//print_r($persona);
?>


<div class="container mt-5 mb-5">
  <div class="row justify-content-center">
    <div class="col-md-4">
      <div class="card">
        <div class="card-header">
          Editar datos:
          <form class="p-4" method="POST" action="/cruddocentesbd/controllers/editarprocesomodulo.php">
            <div class="mb-3">
              <label class="form-label">Programa: </label>
              <input type="text" class="form-control" name="txtPrograma" required value="<?php echo $modulo->Programa; ?>">
            </div>
            <div class="mb-3">
              <label class="form-label">Nombre de Modulo: </label>
              <input type="text" class="form-control" name="txtNombreModulo" required value="<?php echo $modulo->NombreModulo; ?>">
            </div>
            <div class="mb-3">
              <label class="form-label">Creditos: </label>
              <input type="number" class="form-control" name="numCreditos" required value="<?php echo $modulo->Creditos; ?>">
            </div>
            <div class="mb-3">
              <label class="form-label">Precios: </label>
              <input type="number" class="form-control" name="numPrecio" required value="<?php echo $modulo->Precio; ?>">
            </div>
            <div class="d-grid">
              <input type="hidden" name="idModulo" value="<?php echo $modulo->idModulo; ?>">
              <input type="submit" class="btn btn-primary" value="Editar">
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>



<?php include '../template/footer.php' ?>