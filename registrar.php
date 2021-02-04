<?php include("db.php"); ?>

<?php
    if(isset($_POST['registrar'])) {
        $user = $_POST['user'];
        $password = password_hash($_POST['password'],PASSWORD_DEFAULT);
        $email = $_POST['email'];
        $name = $_POST['name'];
        $filas = mysqli_num_rows(mysqli_query($conn,"SELECT * from users where user = '$user' or email = '$email' "));
        if($filas==0) {
            $query = mysqli_query($conn,"INSERT INTO users VALUES ('','$user', '$password', '$email', '$name')");
            if($query) {
                $_SESSION['message3'] = 'Usuario Registrado con Exito';
                $_SESSION['message_type'] = 'success';
                header('Location: index.php');
            }
        } else {
            $_SESSION['message3'] = 'Usuario o Email ya existe, intente otro';
            $_SESSION['message_type'] = 'danger';
            header('Location: index.php');
        }
                
    }
?>