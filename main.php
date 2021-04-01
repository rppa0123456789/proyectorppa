<?php
  session_start();
  if (!$_SESSION['user']) {
    header('location: index.php');
  }
  include("db.php");
  include('includes/header.php');
?>

<main class="container p-4">
  <div>
    <div>
      <h2>
        <?php 
          echo 'Bienvenido: ';
          echo $_SESSION['name'];
        ?>
      </h2>
      <form action="sesion.php" method="post">
        <input id="salir" type="submit" name="salir" class="btn btn-primary float-right" value="Salir">
      </form>
      <a href="papelera.php" id="papelera" name="papelera" value="Papelera" class="btn btn-primary float-right">Papelera</a>
    </div>
    <!-- MENSAJES -->
    <div class="col-md-5">
      <?php if (isset($_SESSION['message'])) { ?>
      <div class="alert alert-<?= $_SESSION['message_type']?> alert-dismissible fade show" role="alert">
        <?= $_SESSION['message']?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <?php } ?>
    </div>
  </div>
  <hr>
  <h3>Mis Tareas</h3>
  <div class="row">
    <div class="col-md-4">
      <div>
        <input id="add" type="button" name="add_new_task" class="btn btn-success btn-block" value="Agregar Tarea">
      </div>
      <div id="new" class="card card-body" style="display: none">
        <form action="save.php" method="POST">
          <div class="form-group">
            <input type="text" name="title" class="form-control" placeholder="Titulo" autofocus required>
          </div>
          <div class="form-group">
            <textarea name="description" rows="2" class="form-control" placeholder="Descripción" required></textarea>
          </div>
          <input type="submit" name="save_task" class="btn btn-success btn-block" value="Guardar Tarea">
          <input id="close" type="button" name="close" class="btn btn-danger btn-block" value="Cerrar">
        </form>
      </div>
    </div>
    <div class="col-md-8">
    <h4>Tareas Pendientes</h4>
      <table class="table table-bordered tasks">
        <thead>
          <tr>
            <th>Titulo</th>
            <th>Descripción</th>
            <th>Creado</th>
            <th>Accción</th>
          </tr>
        </thead>
        <tbody>

          <?php
          $query = "SELECT * FROM task WHERE performed = '0' AND borrado = '0' ";
          $result_tasks = mysqli_query($conn, $query);    

          while($row = mysqli_fetch_assoc($result_tasks)) { ?>
          <tr>
            <td><?php echo $row['title']; ?></td>
            <td><?php echo $row['description']; ?></td>
            <td><?php echo $row['created_at']; ?></td>
            <td>
              <a href="edit_task.php?id=<?php echo $row['id']?>" title="Editar" class="btn btn-secondary">
                <i title="Editar" class="fas fa-marker"></i>
              </a>
              <a href="borrar_tarea.php?id=<?php echo $row['id']?>" title="Borrar" class="btn btn-danger">
                <i title="Borrar" class="far fa-trash-alt"></i>
              </a>
              <a href="task_performed.php?id=<?php echo $row['id']?>" name="ya" title="Realizar" class="btn btn-success">
                <i title="Realizar" class="fas fa-check-circle"></i>
              </a>
            </td>
          </tr>
          <?php } ?>
        </tbody>
      </table>
      <hr>
      <h4>Tareas Realizadas</h4>
      <table class="table table-bordered tasks">
        <thead>
          <tr>
            <th>Titulo</th>
            <th>Descripción</th>
            <th>Creado</th>
            <th>Acción</th>
          </tr>
        </thead>
        <tbody>

          <?php
          $query = "SELECT * FROM task WHERE performed = '1' AND borrado = '0' ";
          $result_tasks = mysqli_query($conn, $query);    

          while($row = mysqli_fetch_assoc($result_tasks)) { ?>
          <tr>
            <td><?php echo $row['title']; ?></td>
            <td><?php echo $row['description']; ?></td>
            <td><?php echo $row['created_at']; ?></td>
            <td>
              <a href="edit_task.php?id=<?php echo $row['id']?>" title="Editar" class="btn btn-secondary">
                <i title="Editar" class="fas fa-marker"></i>
              </a>
              <a href="borrar_tarea.php?id=<?php echo $row['id']?>" title="Borrar" class="btn btn-danger">
                <i title="Borrar" class="far fa-trash-alt"></i>
              </a>
              <a href="task_pending.php?id=<?php echo $row['id']?>" title="Pendiente" class="btn btn-danger">
                <i title="Pendiente" class="fas fa-times-circle"></i>
              </a>
            </td>
          </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>
  </div>
  <hr>
  <h3>Mis Notas</h3>
  <div class="row">
    <div class="col-md-4">
      <div>
        <input id="add1" type="button" name="add_new_note" class="btn btn-success btn-block" value="Agregar Nota">
      </div>
      <div id="new1" class="card card-body" style="display: none">
        <form action="save.php" method="POST">
          <div class="form-group">
            <input type="text" name="title" class="form-control" placeholder="Titulo" autofocus required>
          </div>
          <div class="form-group">
            <textarea name="description" rows="2" class="form-control" placeholder="Descripción" required></textarea>
          </div>
          <input type="submit" name="save_note" class="btn btn-success btn-block" value="Guardar Nota">
          <input id="close1" type="button" name="close" class="btn btn-danger btn-block" value="Cerrar">
        </form>
      </div>
    </div>
    <div class="col-md-8">
      <table class="table table-bordered notes">
      <h4>Notas</h4>
        <thead>
          <tr>
            <th>Titulo</th>
            <th>Descripción</th>
            <th>Acción</th>
          </tr>
        </thead>
        <tbody>

          <?php
          $query = "SELECT * FROM notes WHERE borrado = '0'";
          $result_notes = mysqli_query($conn, $query);    

          while($row = mysqli_fetch_assoc($result_notes)) { ?>
          <tr>
            <td><?php echo $row['title']; ?></td>
            <td><?php echo $row['description']; ?></td>
            <td>
              <a href="edit_note.php?id=<?php echo $row['id']?>" title="Editar" class="btn btn-secondary">
                <i title="Editar" class="fas fa-marker"></i>
              </a>
              <a href="borrar_nota.php?id=<?php echo $row['id']?>" title="Borrar" class="btn btn-danger">
                <i title="Borrar" class="far fa-trash-alt"></i>
              </a>
            </td>
          </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>
  </div>
</main>

<?php include('includes/footer.php'); ?>
