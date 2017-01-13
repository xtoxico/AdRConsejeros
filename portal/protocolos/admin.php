
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
          <h3>Añadir Carpetas / Protocolos</h3>

            <div class="row-fluid">
              <div class="col-md-12">
                <a class="btn btn-primary" href="addfolder.php?id=<?php echo $_GET['id'];?>">+ Añadir carpeta</a>
                <a class="btn btn-primary" href="addprotocolos.php?id=<?php echo $_GET['id'];?>">+ Añadir Protocolos</a>
              </div>
            </div>
            <br>
            <br>
          <h3>Eliminar Carpetas / Protocolos</h3>
            <!--<table class="table table-hover" style="width: 100%">
            <thead style="font-weight: bold"><tr><td>#</td><td style="width:90%">Descripcion</td><td></td></tr></thead>
            <?php
              $sql = 'select * from protocolos_carpetas';
              $res = mysqli_query($con,$sql);
              $i=1;
              while ($row=mysqli_fetch_array($res)){
                echo '<tr style="font-weight: bold"><td>'.$i.'</td><td>'.$row['descripcion'].'</td><td><a class="delcarpeta" data="'.$row['id_carpeta'].'" title="Eliminar Carpeta" target="_blank"><i class="glyphicon glyphicon-remove"> </i></a></td></tr>';
                $sql2 = 'select * from protocolos where id_carpeta="'.$row['id_carpeta'].'"';
                $res2 = mysqli_query($con,$sql2);
                while ($row2=mysqli_fetch_array($res2)){                  
                  echo '<tr><td></td><td>'.$row2['descripcion'].'</td><td><a class="delprotocolos" data="'.$row2['id_protocolos'].'" title="Eliminar Restriccio"><i class="glyphicon glyphicon-remove"> </i></a></td></tr>';
                }
                $i++;
              }

            ?>
                
            </table>-->
            <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
            
            <?php
              $sql = 'select * from protocolos_carpetas';
              $res = mysqli_query($con,$sql);
              $i=1;
              while ($row=mysqli_fetch_array($res)){


                echo '<div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="heading'.$i.'">';


                echo '<table style="width:100%">
                        <tr style="font-weight: bold">
                          <td width="95%">
                            <h4 class="panel-title">
                             <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse'.$i.'" aria-expanded="true" aria-controls="collapse'.$i.'">
                              '.$row['descripcion'].'
                              </a>
                             </h4>
                          </td>
                          <td>
                            <a class="delcarpeta" data="'.$row['id_carpeta'].'" title="Eliminar Carpeta" target="_blank">
                              <i class="glyphicon glyphicon-remove"> </i>
                            </a>
                            <a href="upfolder.php?id='.$_GET['id'].'&idfolder='.$row['id_carpeta'].'&foldername='.$row['descripcion'].'" data="'.$row['id_carpeta'].'" title="Editar Carpeta" target="_blank">
                              <i class="glyphicon glyphicon-pencil"> </i>
                            </a>
                          </td>
                        </tr>
                      </table>';
                echo '</div>';
                echo '<div id="collapse'.$i.'" class="panel-collapse collapse " role="tabpanel" aria-labelledby="heading'.$i.'">
                        <div class="panel-body">';
                echo '<table style="width: 100%">';
                $sql2 = 'select * from protocolos where id_carpeta="'.$row['id_carpeta'].'" order by descripcion';
                $res2 = mysqli_query($con,$sql2);
                while ($row2=mysqli_fetch_array($res2)){                  
                  echo '<tr><td width="95%" style="padding-left: 20px">        '.$row2['descripcion'].'</td><td><a class="delprotocolos" data="'.$row2['id_protocolos'].'" title="Eliminar Circular"><i class="glyphicon glyphicon-remove"> </i></a></td></tr>';
                }
                echo '</table>';
                $i++;
                echo '</div>
                    </div>
                  </div>';
              }

            ?> 
            
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
        $('.delprotocolos').click(function(){
            if(confirm("¿Deseas Eliminar esta circular?")){
                window.location='action.php?id='+id+'&action=delprotocolos&data='+$(this).attr('data');
            }
        })
        $('.delcarpeta').click(function(){
            if(confirm("¿Deseas Eliminar esta carpeta incluyendo todas las circulares contenidas de manera definitiva?")){
                if(confirm("¿Seguro que deseas continuar?")){
                  
                  window.location='action.php?id='+id+'&action=delfolder&data='+$(this).attr('data');
                }
            }
        })
    </script>
  </body>
</html>