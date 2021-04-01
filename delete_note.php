<?php
session_start();
include("db.php");
if (isset($_SESSION['user'])){
  if(isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "DELETE FROM notes WHERE id = $id";
    $result = mysqli_query($conn, $query);
    if(!$result) {
      die("Query Failed.");
    }

    $_SESSION['message'] = 'Nota Borrada';
    $_SESSION['message_type'] = 'danger';
    header('Location: papelera.php');
  }
}
?>