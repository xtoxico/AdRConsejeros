
<?php
include 'conect.php';

if (isset($_GET['id'])){
  $sql = 'select * from usuarios where id_hash="'.$_GET['id'].'"';
  $res = mysqli_query($con,$sql);
  $num = mysqli_num_rows($res);
  if ($num<1){
    $userlog=false;
    $userstatus='Usuario no valido';
  }else{
    $userlog=true;
    $row=mysqli_fetch_array($res);
    $user=$row['usuario'];
    $email=$row['email'];
  }
}else{
  $userlog=false;
  $userstatus='Usuario no logado';
}




?>



<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
   <title>ADR Consejeros - Portal de Clientes</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.css"  rel ="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

  <style>
    body {
      padding-top: 100px;
    }
    .starter-template {
      padding: 40px 15px;
      text-align: center;
    }
  </style>

  </head>
  <body>
    <?php 
      require_once "navbar.php";
    ?>
    <div class="container">
      <div class="row-fluid">
        <div class="col-md-3" style="text-align: center">
            <?php 
              if ($userlog){
                echo '<a href="circulares.php">';
              }else{
                echo '<a href="#" data-toggle="modal" data-target="#myModal">';
              }
            ?>
              <img src="imgicon/metroui-apps-windows8-news-icon.png" class="img-responsive">
              <h4>Circulares</h4>
            </a>
        </div>
        <div class="col-md-3" style="text-align: center">
          <?php 
            if ($userlog){
              echo '<a href="restricciones.php">';
            }else{
              echo '<a href="#" data-toggle="modal" data-target="#myModal">';
            }
          ?>
            <img src="imgicon/metroui-apps-windows8-maps-icon.png" class="img-responsive">
            <h4>Restricciones de tráfico</h4>
          </a>
        </div>
        <div class="col-md-3" style="text-align: center">
          <?php 
            if ($userlog){
              echo '<a href="formacion.php">';
            }else{
              echo '<a href="#" data-toggle="modal" data-target="#myModal">';
            }
          ?>
            <img src="imgicon/metroui-apps-calendar-icon.png" class="img-responsive">
            <h4>Formación Específica</h4>
          </a>
        </div>

        <div class="col-md-3" style="text-align: center">
          <?php 
            if ($userlog){
              echo '<a href="legislacion.php">';
            }else{
              echo '<a href="#" data-toggle="modal" data-target="#myModal">';
            }
          ?>
            <img src="imgicon/metroui-folder-os-security-icon.png" class="img-responsive">
            <h4>Legislación</h4>
          </a>
        </div>
    
        <div class="row-fluid">
          <div class="col-md-3" style="text-align: center">
            <?php 
              if ($userlog){
                echo '<a href="legislacion.php">';
              }else{
                echo '<a href="#" data-toggle="modal" data-target="#myModal">';
              }
            ?>
              <img src="imgicon/metroui-folder-os-security-approved-icon.png" class="img-responsive">
              <h4>Protocolos</h4>
            </a>
          </div>
          <div class="col-md-3" style="text-align: center">
            <?php 
              if ($userlog){
                echo '<a href="seguridad.php">';
              }else{
                echo '<a href="#" data-toggle="modal" data-target="#myModal">';
              }
            ?>
              <img src="imgicon/metroui-apps-vlc-mediaplayer-icon.png" class="img-responsive">
              <h4>Kits Adr y señalización</h4>
            </a>
          </div>
          <div class="col-md-3" style="text-align: center">
            <?php 
              if ($userlog){
                echo '<a href="documentos.php">';
              }else{
                echo '<a href="#" data-toggle="modal" data-target="#myModal">';
              }
            ?>
              <img src="imgicon/metroui-apps-notepad-alt-icon.png" class="img-responsive">
              <h4>Documentos de interes</h4>
            </a>
          </div>
          <div class="col-md-3" style="text-align: center">
            <?php 
              if ($userlog){
                echo '<a href="enlaces.php">';
              }else{
                echo '<a href="#" data-toggle="modal" data-target="#myModal">';
              }
            ?>
              <img src="imgicon/metroui-other-task-icon.png" class="img-responsive">
              <h4>Enlaces de interes</h4>
            </a>
          </div>
        </div>


      </div>
    </div>


    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">Acceso de usuarios</h4>
          </div>
          <div class="modal-body">
            <form>
              <div class="form-group">
                <label for="exampleInputEmail1">Correo Electrónico</label>
                <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Email">
              </div>
              <div class="form-group">
                <label for="exampleInputPassword1">Password</label>
                <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
              </div>
            </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
            <button type="button" class="btn btn-primary">Login</button>
          </div>
        </div>
      </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="js/vendor/jquery.min.js"><\/script>')</script>
    <script src="js/bootstrap.min.js"></script>
    
    </script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>