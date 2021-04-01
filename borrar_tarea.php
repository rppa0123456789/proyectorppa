<?php
session_start();
include("db.php");

if (isset($_SESSION['user'])){
  if(isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "UPDATE task SET borrado ='1' WHERE id = $id";
    $result = mysqli_query($conn, $query);
    if(!$result) {
      die("Query Failed.");
    }

    $_SESSION['message'] = 'Tarea Borrada';
    $_SESSION['message_type'] = 'danger';
    header('Location: main.php');
  }
}
?>