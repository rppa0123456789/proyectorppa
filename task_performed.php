<?php
session_start();
include("db.php");
if (isset($_SESSION['user'])){
  
  if(isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "UPDATE task SET performed ='1' WHERE id = $id";
    $result = mysqli_query($conn, $query);
    if(!$result) {
      die("Query Failed.");
    }

    $_SESSION['message'] = 'Tarea Realizada';
    $_SESSION['message_type'] = 'success';
    header('Location: main.php');
  }
}
?>