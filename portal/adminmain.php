
<?php


  require_once "conect.php";
    

if (isset($_GET['id'])){
  $sql = 'select * from adr_usuarios where admin=1 and hash="'.$_GET['id'].'"';
  $res = mysqli_query($con,$sql);
  $num = mysqli_num_rows($res);
  if ($num<1){
    $userlog=false;
    $userstatus='Usuario no valido';
  }else{
    $userlog=true;
    $row=mysqli_fetch_array($res);
    $user=$row['nombre'];
    $email=$row['email'];
  }
}else{
  $userlog=false;
  $userstatus='Usuario no logado';
}
 

  if ($userlog==false){ 
    header ("location: main.php");
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
        <div class="col-md-8 col-md-offset-2" style="text-align: left">
        <h3>Portal de administracion</h3>
          <table class="table table-condensed table-hover"> 
            <tr>
              <td style="width: 60px">
                <?php
                if ($userlog){
                  echo '
                      <a href="usuarios/admin.php?id='.$_GET['id'].'">';
                    }
                ?>
                  <img src="imgicon/metroui-folder-os-configure-icon.png" style="width: 56px">
                </a>
              </td>
              <td>
                
                <?php
                if ($userlog){
                  echo '
                      <a href="usuarios/admin.php?id='.$_GET['id'].'">';
                    }
                ?>
                  <h4>Usuarios</h4>
                </a>
              </td>
            </tr>
            <tr>
              <td style="width: 60px">
                <?php
                if ($userlog){
                  echo '
                      <a href="circulares/admin.php?id='.$_GET['id'].'">';
                    }
                ?>
                  <img src="imgicon/metroui-apps-windows8-news-icon.png" style="width: 56px">
                </a>
              </td>
              <td>
                <?php
                if ($userlog){
                  echo '
                      <a href="circulares/admin.php?id='.$_GET['id'].'">';
                    }
                ?>
                  <h4>Circulares</h4>
                </a>
              </td>
            </tr>

            <tr>
              <td style="width: 60px">
                <?php
                if ($userlog){
                  echo '
                      <a href="rtraf/admin.php?id='.$_GET['id'].'">';
                    }
                ?>
                  <img src="imgicon/metroui-apps-windows8-maps-icon.png" style="width: 56px">
                </a>
              </td>
              <td>
                <?php
                if ($userlog){
                  echo '
                      <a href="rtraf/admin.php?id='.$_GET['id'].'">';
                    }
                ?>
                  <h4>Restricciones de tráfico</h4>
                </a>
              </td>
            </tr>

            <tr>
              <td style="width: 60px">
                <?php
                if ($userlog){
                  echo '
                      <a href="formacion/admin.php?id='.$_GET['id'].'">';
                    }
                ?>
                  <img src="imgicon/metroui-apps-calendar-icon.png" style="width: 56px">
                </a>
              </td>
              <td>
                <?php
                if ($userlog){
                  echo '
                      <a href="formacion/admin.php?id='.$_GET['id'].'">';
                    }
                ?>
                  <h4>Formación específica</h4>
                </a>
              </td>
            </tr>

            <tr>
              <td style="width: 60px">
                <?php
                if ($userlog){
                  echo '
                      <a href="legislacion/admin.php?id='.$_GET['id'].'">';
                    }
                ?>
                  <img src="imgicon/metroui-folder-os-security-icon.png" style="width: 56px">
                </a>
              </td>
              <td>
                <?php
                if ($userlog){
                  echo '
                      <a href="legislacion/admin.php?id='.$_GET['id'].'">';
                    }
                ?>
                  <h4>Legislación</h4>
                </a>        
              </td>
            </tr>

            
            
            <tr>
              <td style="width: 60px">
                <?php
                if ($userlog){
                  echo '
                      <a href="protocolos/admin.php?id='.$_GET['id'].'">';
                    }
                ?>
                  <img src="imgicon/metroui-folder-os-security-approved-icon.png" style="width: 56px">
                </a>
              </td>
              <td>
                <?php
                if ($userlog){
                  echo '
                      <a href="protocolos/admin.php?id='.$_GET['id'].'">';
                    }
                ?>
                  <h4>Protocolos de seguridad</h4>
                </a>        
              </td>
            </tr>

            
            <tr>
              <td style="width: 60px">
                <?php
                if ($userlog){
                  echo '
                      <a href="seguridadadmin.php?id='.$_GET['id'].'">';
                    }
                ?>
                
                  <img src="imgicon/metroui-apps-vlc-mediaplayer-icon.png" style="width: 56px">
                </a>
              </td>
              <td>
                <?php
                if ($userlog){
                  echo '
                      <a href="seguridadadmin.php?id='.$_GET['id'].'">';
                    }
                ?>
                  <h4>Kits ADR y señalización</h4>
                </a>
              </td>
            </tr>
            <tr>
              <td style="width: 60px">
                 <?php
                if ($userlog){
                  echo '
                      <a href="documentosadmin.php?id='.$_GET['id'].'">';
                    }
                ?>
                  <img src="imgicon/metroui-apps-notepad-alt-icon.png" style="width: 56px">
                </a>
              </td>
              <td>
                 <?php
                if ($userlog){
                  echo '
                      <a href="documentosadmin.php?id='.$_GET['id'].'">';
                    }
                ?>
                  <h4>Documentos de interes</h4>
                </a>
              </td>
            </tr>
            <tr>
              <td style="width: 60px">
                 <?php
                if ($userlog){
                  echo '
                      <a href="enlacesadmin.php?id='.$_GET['id'].'">';
                    }
                ?>
                  <img src="imgicon/metroui-other-task-icon.png" style="width: 56px">
                </a>
              </td>
              <td>
                 <?php
                if ($userlog){
                  echo '
                      <a href="enlacesadmin.php?id='.$_GET['id'].'">';
                    }
                ?>
                  <h4>Enlaces de interes</h4>
                </a>
              </td>
            </tr>
          </table>
        </div>
      </div>      
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="js/vendor/jquery.min.js"><\/script>')</script>
    <script src="js/bootstrap.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>