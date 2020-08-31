<?php

include('db.php');

if (isset($_POST['save_note'])) {
  $title = $_POST['title'];
  $description = $_POST['description'];
  $query = "INSERT INTO notes(title, description) VALUES ('$title', '$description')";
  $result = mysqli_query($conn, $query);
  if(!$result) {
    die("Query Failed.");
  }

  $_SESSION['message1'] = 'Note Saved Successfully';
  $_SESSION['message_type'] = 'success';
  header('Location: index.php');

}

?>