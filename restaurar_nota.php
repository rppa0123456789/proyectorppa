<?php
session_start();
include("db.php");

if (isset($_SESSION['user'])){
  if(isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "UPDATE notes SET borrado ='0' WHERE id = $id";
    $result = mysqli_query($conn, $query);
    if(!$result) {
      die("Query Failed.");
    }

    $_SESSION['message'] = 'Nota Restaurada';
    $_SESSION['message_type'] = 'success';
    header('Location: papelera.php');
  }
}
?>