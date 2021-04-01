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
      <a href="main.php" id="principal" name="principal" class="btn btn-primary float-right" value="Principal">Principal</a>
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
    <div class="col-auto">
    <h4>Tareas Pendientes</h4>
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
          $query = "SELECT * FROM task WHERE performed = '0' AND borrado = '1' ";
          $result_tasks = mysqli_query($conn, $query);    

          while($row = mysqli_fetch_assoc($result_tasks)) { ?>
          <tr>
            <td><?php echo $row['title']; ?></td>
            <td><?php echo $row['description']; ?></td>
            <td><?php echo $row['created_at']; ?></td>
            <td>
              <a href="delete_task.php?id=<?php echo $row['id']?>" title="Eliminar" class="btn btn-danger">
                <i title="Eliminar" class="far fa-trash-alt"></i>
              </a>
              <a href="restaurar_tarea.php?id=<?php echo $row['id']?>" title="Restaurar" class="btn btn-success">
                <i title="Restaurar" class="fas fa-check-circle"></i>
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
          $query = "SELECT * FROM task WHERE performed = '1' AND borrado = '1' ";
          $result_tasks = mysqli_query($conn, $query);    

          while($row = mysqli_fetch_assoc($result_tasks)) { ?>
          <tr>
            <td><?php echo $row['title']; ?></td>
            <td><?php echo $row['description']; ?></td>
            <td><?php echo $row['created_at']; ?></td>
            <td>
              <a href="delete_task.php?id=<?php echo $row['id']?>" title="Eliminar" class="btn btn-danger">
                <i title="Eliminar" class="far fa-trash-alt"></i>
              </a>
              <a href="restaurar_tarea.php?id=<?php echo $row['id']?>" title="Restaurar" class="btn btn-success">
              <i title="Restaurar" class="fas fa-check-circle"></i>
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
    <div class="col-auto">
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
          $query = "SELECT * FROM notes WHERE borrado = '1' ";
          $result_notes = mysqli_query($conn, $query);    

          while($row = mysqli_fetch_assoc($result_notes)) { ?>
          <tr>
            <td><?php echo $row['title']; ?></td>
            <td><?php echo $row['description']; ?></td>
            <td>
              <a href="delete_note.php?id=<?php echo $row['id']?>" title="Eliminar" class="btn btn-danger">
                <i title="Eliminar" class="far fa-trash-alt"></i>
              </a>
              <a href="restaurar_nota.php?id=<?php echo $row['id']?>" title="Restaurar" class="btn btn-success">
              <i title="Restaurar" class="fas fa-check-circle"></i>
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