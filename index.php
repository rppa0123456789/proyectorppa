<?php 
  session_start();
  include("db.php");
  include('includes/header.php');
?>

<div class="container p-4">
  <?php if (isset($_SESSION['message'])) { ?>
  <div class="alert alert-<?= $_SESSION['message_type']?> alert-dismissible fade show" role="alert">
    <?= $_SESSION['message']?>
  </div>
  <?php session_unset(); } ?>
  <div class="container container-md inicio-sesion" id="logu">
    <div class="row justify-content-md-center">
        <div class="col-md-6">
          <div class="card">
              <div class="card-header text-center">
                  <h2>My Personal To-Do App</h2>
              </div>
              
              <div class="card-body">
                  <form action="iniciar.php" method="post" id="login">
                    <legend>Inicio sesión</legend>
                    
                    <div class="form-group">
                        <input type="text" class="form-control" name="user" id="user" placeholder="User">
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" name="password" id="password" placeholder="Password">
                    </div>
                    
                    <button type="submit" id="iniciar_sesion" name="iniciar_sesion" class="btn btn-primary">Iniciar sesión</button>

                    <input id="reg" type="button" name="registro" class="btn btn-primary float-right" value="Registro">
                  </form>
              </div>
          </div>
          <div role="alert" id="msg"></div>
        </div>
    </div>
  </div>

  <div class="container container-md registro" id="newu" style="display: none">
    <div class="row justify-content-md-center">

      <div class="col-md-6">

        <div class="card">
          <div class="card-header text-center">
            <h2>My Personal To-Do App</h2>
          </div>

          <div role="alert" id="msg"></div>

          <div class="card-body">
            <form id="registro" method="post" action="registrar.php">
              <legend>Registro</legend>

              <div class="form-group">
                <input type="text" class="form-control" id="user" name="user" placeholder="User">
              </div>
              <div class="form-group">
                <input type="password" class="form-control" id="password" name="password" placeholder="Password">
              </div>
              <div class="form-group">
                <input type="email" class="form-control" id="email" name="email" placeholder="Email">
              </div>
              <div class="form-group">
                <input type="text" class="form-control" id="name" name="name" placeholder="Name">
              </div>

              <input id="registrar" type="submit" name="registrar" class="btn btn-primary" value="Registrar">
              
              <input id="log" type="button" name="inicio" class="btn btn-primary float-right" value="Iniciar sesión">
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?php include('includes/footer.php'); ?>