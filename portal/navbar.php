<?php
  $sql = 'select * from adr_usuarios where hash="'.$_GET['id'].'"';
  $res = mysqli_query($con,$sql);

  $row=mysqli_fetch_array($res);

  if ($row['admin']==1){
    $useradmin=true;
  }else{
    $useradmin=false;
  }

?>


<nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#"><img src="http://adrconsejeros.es/portal/img/mini-logo-adr.png" style="width: 80px; margin-top: -5px;"></a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
          <?php
                if ($userlog){
                  echo '<li ><a href="http://adrconsejeros.es/portal/main.php?id='.$_GET['id'].'">Inicio</a></li>';
                }else{
                  echo '<li ><a href="http://adrconsejeros.es/portal/main.php">Inicio</a></li>';
                }
          ?>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Servicios <span class="caret"></span></a>
              <ul class="dropdown-menu">
              <?php
                if ($userlog){
                  echo '
                      <li><a href="circulares/carpetas.php?id='.$_GET['id'].'">Circulares</a></li>
                      <li><a href="rtraf/carpetas.php?id='.$_GET['id'].'">Restricciones de Tráfico</a></li>
                      <li><a href="formacion.php?id='.$_GET['id'].'">Formación Especifica</a></li>
                      <li><a href="seguridad.php?id='.$_GET['id'].'">Kits ADR y señalización</a></li>
                      <li><a href="protocolos/carpetas.php?id='.$_GET['id'].'">Protocolos</a></li>
                      <li><a href="legislacion/carpetas.php?id='.$_GET['id'].'">Legislación</a></li>
                      <li><a href="documentos.php?id='.$_GET['id'].'">Documentos de interes</a></li>
                      <li><a href="enlaces.php?id='.$_GET['id'].'">Enlaces de interés</a></li>';
                }else{
                  echo '
                      <li><a href="#" data-toggle="modal" data-target="#myModal">Circulares</a></li>
                      <li><a href="#" data-toggle="modal" data-target="#myModal">Restricciones de Tráfico</a></li>
                      <li><a href="#" data-toggle="modal" data-target="#myModal">Formación Especifica</a></li>
                      <li><a href="#" data-toggle="modal" data-target="#myModal">Kits ADR y señalización</a></li>
                      <li><a href="#" data-toggle="modal" data-target="#myModal">Protocolos</a></li>
                      <li><a href="#" data-toggle="modal" data-target="#myModal">Legislación</a></li>
                      <li><a href="#" data-toggle="modal" data-target="#myModal">Documentos de interes</a></li>
                      <li><a href="#" data-toggle="modal" data-target="#myModal">Enlaces de interés</a></li>';
                }
              ?>
              </ul>
            </li>
            <?php
                if ($useradmin){
                  echo '<li ><a href="http://adrconsejeros.es/portal/adminmain.php?id='.$_GET['id'].'">Admininstracion</a></li>';
                }
            ?>
          </ul>

          <ul class="nav navbar-nav pull-right">  
          <?php       
            if ($userlog){   
             echo '<li class="dropdown">
                              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">'.$email.'<span class="caret"></span></a>
                              <ul class="dropdown-menu">
                                <li><a href="http://adrconsejeros.es/portal/main.php">Cerrar Sesión</a></li>                
                              </ul>
                            </li>';
            }else{
               echo '<li>
                              <a href="#" data-toggle="modal" data-target="#myModal">Login<span class="caret"></span></a>
                              
                            </li>';
            }
          ?>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>