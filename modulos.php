<?php include 'template/header.php' ?>

<?php
include_once "model/connection.php";
$sentencia = $bd->query("select * from modulos");
$modulo = $sentencia->fetchAll(PDO::FETCH_OBJ);
//print_r($persona);

?>



<div class="container mt-5">
  <div class="row justify-content-center">
    <div class="col-md-9">
      <!--Inicio alerta -->
      <?php
      if (isset($_GET['mensaje']) and $_GET['mensaje'] == 'falta') {

      ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
          <strong>Error!</strong> Rellena todos los campos.
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
      <?php
      }
      ?>


      <?php
      if (isset($_GET['mensaje']) and $_GET['mensaje'] == 'registrado') {

      ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
          <strong>Registrado!</strong> Se agregaron los datos.
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
      <?php
      }
      ?>


      <?php
      if (isset($_GET['mensaje']) and $_GET['mensaje'] == 'error') {

      ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
          <strong>Error!</strong> Vuelve a intentar.
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
      <?php
      }
      ?>



      <?php
      if (isset($_GET['mensaje']) and $_GET['mensaje'] == 'editado') {

      ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
          <strong>Cambiado!</strong> Los datos fueron actualizados.
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
      <?php
      }
      ?>


      <?php
      if (isset($_GET['mensaje']) and $_GET['mensaje'] == 'eliminado') {

      ?>
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
          <strong>Eliminado!</strong> Los datos fueron borrados.
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
      <?php
      }
      ?>




      <!-- Fin Alerta -->



      <div class="card">
        <div class="card-header">
          Lista de Modulos
        </div>
        <div class="p-4">
          <div class="table-responsive">
            <table class="table table-Light align-middle">
              <thead>
                <tr>
                  <th scope="col">Id</th>
                  <th scope="col">Programa</th>
                  <th scope="col">Nombre de Modulo</th>
                  <th scope="col">Creditos</th>
                  <th scope="col">Precios</th>
                  <th scope="col" colspan="2">Opciones</th>
                </tr>
              </thead>
              <tbody>
                <?php
                foreach ($modulo as $dato) {
                ?>
                  <tr class="">
                    <td scope="row"><?php echo $dato->idModulo; ?></td>
                    <td><?php echo $dato->Programa; ?></td>
                    <td><?php echo $dato->NombreModulo; ?></td>
                    <td><?php echo $dato->Creditos; ?></td>
                    <td><?php echo $dato->Precio; ?></td>
                    <td><a href="editar.php?codigo=<?php echo $dato->codigo; ?>"><i class="text-success bi bi-pencil-square"></i></a></td>
                    <td><a onclick="return confirm('¿Estas seguro de eliminar?');" href=" eliminar.php?codigo=<?php echo $dato->codigo; ?>"><i class="text-danger bi bi-trash3"></i></a></td>
                  </tr>
                <?php
                }
                ?>
              </tbody>
            </table>
          </div>

        </div>
      </div>
    </div>
    <div class="col-md-3 mb-5">
      <div class="card">
        <div class="card-header">
          Ingresar datos:
          <form class="p-4" method="POST" action="registrar.php">
            <div class="mb-3">
              <label class="form-label">Programa: </label>
              <input type="text" class="form-control" name="txtPrograma" autofocus required>
            </div>
            <div class="mb-3">
              <label class="form-label">Nombre Modulo: </label>
              <input type="text" class="form-control" name="txtNombreModulo" autofocus required>
            </div>
            <div class="mb-3">
              <label class="form-label">Creditos: </label>
              <input type="number" class="form-control" name="numCreditos" autofocus required>
            </div>
            <div class="mb-3">
              <label class="form-label">Precio: </label>
              <input type="number" class="form-control" name="numPrecio" autofocus required>
            </div>
            <div class="d-grid">
              <input type="hidden" name="oculto" value="1">
              <input type="submit" class="btn btn-primary" value="Registrar">
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>







<?php include 'template/footer.php' ?>