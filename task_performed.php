<?php

include("db.php");

if(isset($_GET['id'])) {
  $id = $_GET['id'];
  $query = "UPDATE task SET performed ='1' WHERE id = $id";
  $result = mysqli_query($conn, $query);
  if(!$result) {
    die("Query Failed.");
  }

  $_SESSION['message'] = 'Task Successfully Performed';
  $_SESSION['message_type'] = 'success';
  header('Location: main.php');
}

?>