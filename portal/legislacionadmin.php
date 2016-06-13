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
      require_once "conect.php";
    ?>
    <div class="container">
      <div class="row-fluid">
        <div class="col-md-12">
          <h3>Administracion de Legislación</h3>
            <table class="table table-hover" style="width: 100%">
            <thead style="font-weight: bold"><tr><td></td><td style="width:90%">Titulo</td><td></td></tr></thead>
            <?php
              $sql = 'select id_legislacion,descripcion from adr_legislacion';
              $res = mysqli_query($con,$sql);
              while ($row=mysqli_fetch_array($res)){
                echo '<tr><td>'.$row['id_legislacion'].'</td><td>'.$row['descripcion'].'</td><td><a href="restriccionesnew.php?accion=update&id_circular='.$row['id_legislacion'].'">Editar</a></td></tr>';
              }
            ?>
              <tr><td colspan="4" style="text-align: right"><a href="legislacionnew.php?accion=nueva" class="btn btn-primary">Nueva Legislación</a> </td></tr>
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