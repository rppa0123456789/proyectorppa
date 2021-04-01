<?php include("db.php"); ?>
<?php
    session_start();

    if(isset($_POST['iniciar_sesion'])) {
        $user = $_POST['user'];
        $password = $_POST['password'];
        $sql = "select * from users where user = '$user'";
        $query = mysqli_query($conn,$sql);
        $filas = mysqli_num_rows($query);
        if($filas) {
            $row = mysqli_fetch_array($query);
            if(password_verify($password,$row['password'])) {
                $_SESSION['user'] = $row['user'];
                $_SESSION['email'] = $row['email'];
                $_SESSION['name'] = $row['name'];

                if($_SESSION['user']){
                    header("location: main.php");
                }else{
                    $_SESSION['message'] = 'Usuario o Contraseña Invalidos';
                    $_SESSION['message_type'] = 'danger';
                    header('Location: index.php');
                }

            }else{
                $_SESSION['message'] = 'Usuario o Contraseña Invalidos';
                $_SESSION['message_type'] = 'danger';
                header('Location: index.php');
            }
        }else{
            $_SESSION['message'] = 'Usuario o Contraseña Invalidos';
            $_SESSION['message_type'] = 'danger';
            header('Location: index.php');
        }
    }
?>