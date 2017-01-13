
<?php


  require_once "../conect.php";
    

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
    header ("location: ../main.php");
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
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/font-awesome.css"  rel ="stylesheet">

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
    require_once "../navbar.php";
  ?>
    <div class="container">
      <div class="row-fluid">
        <div class="col-md-12">
          <h3>Añadir carpeta</h3>
          <form action="action.php" method="GET">           
            <input name="id" id="id" type="hidden" value="<?php echo $_GET['id'];?>">
            <input name="action" id="action" type="hidden" value="addfolder">
             <div class="form-group">
              <label for="data">Descrición de la carpeta</label>
              <input type="text" class="form-control" id="data" name="data" placeholder="Descripcion de la carpeta">
            </div>
            <button type="submit" class="btn btn-default">Aceptar</button>
          </form>
        </div>
      </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="../js/vendor/jquery.min.js"><\/script>')</script>
    <script src="../js/bootstrap.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../js/ie10-viewport-bug-workaround.js"></script>

    <script>
        id = <?php echo $_GET['id'];?>;
        $('#delcircular').click(function(){
            if(confirm("¿Deseas Eliminar esta circular?")){
                window.location='action.php?id='+id+'&action=delcircular&data='+$(this).attr('data');
            }
        })
        $('#delcarpeta').click(function(){
            if(confirm("¿Deseas Eliminar esta carpeta incluyendo todas las circulares contenidas de manera definitiva?")){
                if(confirm("¿Seguro que deseas continuar?")){
                  
                  window.location='action.php?id='+id+'&action=delfolder&data='+$(this).attr('data');
                }
            }
        })
    </script>
  </body>
</html>
