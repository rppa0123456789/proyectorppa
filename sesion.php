<?php
    session_start();

    if (isset($_POST['salir'])) {
        session_destroy();
        session_unset();
        echo true;
        header('Location: index.php');
    }
?>