<?php include 'template/header.php' ?>

<?php
include_once "model/connection.php";
$sentencia = $bd->query("select * from grupos");
$grupo = $sentencia->fetchAll(PDO::FETCH_OBJ);
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
          Lista de Grupos
        </div>
        <div class="p-4">
          <div class="table-responsive">
            <table class="table table-Light align-middle">
              <thead>
                <tr>
                  <th scope="col">IdGrupo</th>
                  <th scope="col">IdModulo</th>
                  <th scope="col">IdDocente</th>
                  <th scope="col">Fecha Inicio</th>
                  <th scope="col">Nro Estudiantes</th>
                  <th scope="col">Jornada</th>
                  <th scope="col" colspan="2">Opciones</th>
                </tr>
              </thead>
              <tbody>
                <?php
                foreach ($grupo as $dato) {
                ?>
                  <tr class="">
                    <td scope="row"><?php echo $dato->idGrupo; ?></td>
                    <td><?php echo $dato->idModulo; ?></td>
                    <td><?php echo $dato->idDocente; ?></td>
                    <td><?php echo $dato->FechaInicio; ?></td>
                    <td><?php echo $dato->NroEstudiantes; ?></td>
                    <td><?php echo $dato->Jornada; ?></td>
                    <td><a href="/cruddocentesbd/controllers/editargrupos.php?idGrupo=<?php echo $dato->idGrupo; ?>"><i class="text-success bi bi-pencil-square"></i></a></td>
                    <td><a onclick="return confirm('¿Estas seguro de eliminar?');" href="  /cruddocentesbd/controllers/eliminargrupos.php?idGrupo=<?php echo $dato->idGrupo; ?>"><i class="text-danger bi bi-trash3"></i></a></td>
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
          <form class="p-4" method="POST" action="/cruddocentesbd/controllers/registrargrupos.php">
            <div class="mb-3">
              <label class="form-label">Id Modulo: </label>
              <input type="number" class="form-control" name="numIdModulo" autofocus required>
            </div>
            <div class="mb-3">
              <label class="form-label">Id Docente: </label>
              <input type="number" class="form-control" name="numIdDocente" autofocus required>
            </div>
            <div class="mb-3">
              <label class="form-label">Fecha Inicio: </label>
              <input type="date" class="form-control" name="date" autofocus required>
            </div>
            <div class="mb-3">
              <label class="form-label">Numero de Estudiantes: </label>
              <input type="number" class="form-control" name="numEstudiantes" autofocus required>
            </div>
            <div class="mb-3">
              <label class="form-label">Jornada: </label>
              <input type="text" class="form-control" name="txtJornada" autofocus required>
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