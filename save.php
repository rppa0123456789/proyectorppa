<?php
  session_start();
  include('db.php');
    
  if (isset($_SESSION['user'])){

    if (isset($_POST['save_note'])) {
      $title = $_POST['title'];
      $description = $_POST['description'];
      $query = "INSERT INTO notes VALUES ('','$title', '$description')";
      $result = mysqli_query($conn, $query);
      if(!$result) {
        die("Query Failed.");
      }
    }

    if (isset($_POST['save_task'])) {
      $title = $_POST['title'];
      $description = $_POST['description'];
      $query = "INSERT INTO task VALUES ('','$title', '$description', now(), '')";
      $result = mysqli_query($conn, $query);
      if(!$result) {
        die("Query Failed.");
      }
    }
    header('Location: main.php');
  }    
?>