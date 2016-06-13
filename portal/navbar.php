<nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="main.php"><img src="img/mini-logo-adr.png" style="width: 80px; margin-top: -5px;"></a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li ><a href="main.php">Inicio</a></li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Servicios <span class="caret"></span></a>
              <ul class="dropdown-menu">
              <?php
                if ($userlog){
                  echo '
                      <li><a href="circulares.php">Circulares</a></li>
                      <li><a href="restricciones.php">Restricciones de Tráfico</a></li>
                      <li><a href="formacion.php">Formación Especifica</a></li>
                      <li><a href="seguridad.php">Kits ADR y señalización</a></li>
                      <li><a href="legislacion.php">Protocolos</a></li>
                      <li><a href="legislacion.php">Legislación</a></li>
                      <li><a href="documentos.php">Documentos de interes</a></li>
                      <li><a href="enlaces.php">Enlaces de interés</a></li>';
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
          </ul>
          <ul class="nav navbar-nav pull-right">  
          <?php       
            if ($userlog){   
             echo '<li class="dropdown">
                              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">'.$email.'<span class="caret"></span></a>
                              <ul class="dropdown-menu">
                                <li><a href="#about">Cerrar Sesión</a></li>                
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