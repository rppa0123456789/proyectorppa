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
    <h2>
      <?php 
        echo 'Bienvenido: ';
        echo $_SESSION['name'];
      ?>
    </h2>
    <form action="sesion.php" method="post">
      <input id="salir" type="submit" name="salir" class="btn btn-primary float-right" value="Salir">
    </form>
  </div>
  <hr>
  <h3>My Tasks</h3>
  <div class="row">
    <div class="col-md-4">
      <!-- TASKS MESSAGES -->

      <!-- ADD TASK FORM -->
      <div>
        <input id="add" type="button" name="add_new_task" class="btn btn-success btn-block" value="Add New Task">
      </div>
      <div id="new" class="card card-body" style="display: none">
        <form action="save.php" method="POST">
          <div class="form-group">
            <input type="text" name="title" class="form-control" placeholder="Task Title" autofocus required>
          </div>
          <div class="form-group">
            <textarea name="description" rows="2" class="form-control" placeholder="Task Description" required></textarea>
          </div>
          <input type="submit" name="save_task" class="btn btn-success btn-block" value="Save Task">
          <input id="close" type="button" name="close" class="btn btn-danger btn-block" value="Close">
        </form>
      </div>
    </div>
    <div class="col-md-8">
    <h4>Task Pending</h4>
      <table class="table table-bordered tasks">
        <thead>
          <tr>
            <th>Title</th>
            <th>Description</th>
            <th>Created At</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>

          <?php
          $query = "SELECT * FROM task WHERE performed = '0' ";
          $result_tasks = mysqli_query($conn, $query);    

          while($row = mysqli_fetch_assoc($result_tasks)) { ?>
          <tr>
            <td><?php echo $row['title']; ?></td>
            <td><?php echo $row['description']; ?></td>
            <td><?php echo $row['created_at']; ?></td>
            <td>
              <a href="edit_task.php?id=<?php echo $row['id']?>" class="btn btn-secondary">
                <i class="fas fa-marker"></i>
              </a>
              <a href="delete_task.php?id=<?php echo $row['id']?>" class="btn btn-danger">
                <i class="far fa-trash-alt"></i>
              </a>
              <a href="task_performed.php?id=<?php echo $row['id']?>" class="btn btn-success">
                <i class="fas fa-check-circle"></i>
              </a>
            </td>
          </tr>
          <?php } ?>
        </tbody>
      </table>
      <hr>
      <h4>Task Performed</h4>
      <table class="table table-bordered tasks">
        <thead>
          <tr>
            <th>Title</th>
            <th>Description</th>
            <th>Created At</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>

          <?php
          $query = "SELECT * FROM task WHERE performed = '1' ";
          $result_tasks = mysqli_query($conn, $query);    

          while($row = mysqli_fetch_assoc($result_tasks)) { ?>
          <tr>
            <td><?php echo $row['title']; ?></td>
            <td><?php echo $row['description']; ?></td>
            <td><?php echo $row['created_at']; ?></td>
            <td>
              <a href="edit_task.php?id=<?php echo $row['id']?>" class="btn btn-secondary">
                <i class="fas fa-marker"></i>
              </a>
              <a href="delete_task.php?id=<?php echo $row['id']?>" class="btn btn-danger">
                <i class="far fa-trash-alt"></i>
              </a>
              <a href="task_pending.php?id=<?php echo $row['id']?>" class="btn btn-danger">
                <i class="fas fa-times-circle"></i>
              </a>
            </td>
          </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>
  </div>
  <hr>
  <h3>My Notes  </h3>
  <div class="row">
    <div class="col-md-4">
      <!-- NOTES MESSAGES -->

      <!-- ADD NOTES FORM -->
      <div>
        <input id="add1" type="button" name="add_new_note" class="btn btn-success btn-block" value="Add New Note">
      </div>
      <div id="new1" class="card card-body" style="display: none">
        <form action="save.php" method="POST">
          <div class="form-group">
            <input type="text" name="title" class="form-control" placeholder="Note Title" autofocus required>
          </div>
          <div class="form-group">
            <textarea name="description" rows="2" class="form-control" placeholder="Note Description" required></textarea>
          </div>
          <input type="submit" name="save_note" class="btn btn-success btn-block" value="Save Note">
          <input id="close1" type="button" name="close" class="btn btn-danger btn-block" value="Close">
        </form>
      </div>
    </div>
    <div class="col-md-8">
      <table class="table table-bordered notes">
      <h4>Notes</h4>
        <thead>
          <tr>
            <th>Title</th>
            <th>Description</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>

          <?php
          $query = "SELECT * FROM notes";
          $result_notes = mysqli_query($conn, $query);    

          while($row = mysqli_fetch_assoc($result_notes)) { ?>
          <tr>
            <td><?php echo $row['title']; ?></td>
            <td><?php echo $row['description']; ?></td>
            <td>
              <a href="edit_note.php?id=<?php echo $row['id']?>" class="btn btn-secondary">
                <i class="fas fa-marker"></i>
              </a>
              <a href="delete_note.php?id=<?php echo $row['id']?>" class="btn btn-danger">
                <i class="far fa-trash-alt"></i>
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
