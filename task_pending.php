<?php

include("db.php");

if(isset($_GET['id'])) {
  $id = $_GET['id'];
  $query = "UPDATE task SET performed ='0' WHERE id = $id";
  $result = mysqli_query($conn, $query);
  if(!$result) {
    die("Query Failed.");
  }

  $_SESSION['message'] = 'Task Pending';
  $_SESSION['message_type'] = 'danger';
  header('Location: main.php');
}

?>