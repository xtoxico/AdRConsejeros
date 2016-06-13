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
            <link href="css/dropzone/basic.css" rel="stylesheet" >
                    <link href="css/datepicker/datepicker.css" rel="StyleSheet">
        <link href="css/wysihtml5/bootstrap-wysihtml5.css" rel="StyleSheet">

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
          <h3>Editor de Circulares</h3>
          <hr>
          <div class="col-md-10 col-md-offset-1">
            <h4 style="font-family: helvetica; font-size: 14px; font-weight: bold">Ficheros Adjuntos</h4>
            <form action="circularesupload.php" id="uploadzone" class="dropzone" style="border: solid 1px #565656; margin: 10px"></form>                                                            
          </div>
          <div class="col-md-10 col-md-offset-1">
          
            <form id="formulario" class="form-horizontal" method="POST" action="adeprove_formulario_circular_gab_dir_post.php" enctype="multipart/form-data">
              <fieldset><!-- Form Name -->
              
              <input type="hidden" id="accion_tipo" name="accion_tipo" value="<?php echo $_GET['accion'];?>">               
              <?php
                    $titulo="";
                    $texto="";
                    $fecha="";
                    if ($_GET['accion']=='update'){
                      echo '<input type="hidden" id="id_circular" name="id_circular" value="'.$_GET['id_circular'].'">';                                        
                        $sql = 'select descripcion,texto, date_format(fecha,"%d/%m/%Y") as fecha from adr_circulares where id_circular = "'.$_GET['id_circular'].'"';
                        $res = mysqli_query($con,$sql);
                        while($row=mysqli_fetch_array($res))
                        {
                          $titulo=$row['descripcion'];
                          $texto=$row['texto'];
                          $fecha=$row['fecha'];
                        }
                      
                    }
              ?>
            <!-- Titulo -->
            <div class="form-group">
              <label class="control-label" for="titulo">Titulo</label>              
                <input id="titulo" name="titulo" type="text" placeholder="titulo" value="<?php echo $titulo;?>"class="form-control">              
            </div>

            <!-- Fecha -->
            <div class="form-group">
              <label for="fecha">Fecha</label>
              <div class="input-group">
               
                  <input class="form-control" id="fecha" type="text"  name="fecha" value="<?php echo $fecha;?>">
                  <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                
              </div>
            </div>
            
            <!-- TEXTBOX -->
            <div class="form-group">
              <label class="control-label" for="imagen">Texto</label>
              <div class="controls">
                <textarea id="texto" name="texto" class="textarea form-control" placeholder="Introduce el texto" style="height: 250px"><?php echo $texto;?></textarea>
              </div>
            </div>
            <div class="control-group">
              
              <div class="controls">
                <textarea id="textoenlaces" style="display:none" name="textoenlaces" placeholder="Introduce el texto" style="width: 850px; height: 250px"><br><br><br></textarea>
              </div>
            </div>

            <!-- Boton 'Salvar' -->
            <div class="control-group">
              <label class="control-label" for="salvar"></label>
              <div class="controls">
                <a id="salvar" name="salvar" class="btn btn-primary input-xlarge pull-right" onclick="validaFormulario()">Guardar</a>
              </div>
            </div>

          </fieldset>
        </form>
      </div>
        </div>
      </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="js/vendor/jquery.min.js"><\/script>')</script>
    <script src="js/bootstrap.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="js/ie10-viewport-bug-workaround.js"></script>
    <script type="text/javascript" src="js/datepicker/bootstrap-datepicker.js" ></script>
    <script type="text/javascript" src="js/wysihtml5/wysihtml5-0.3.0.js" ></script>
    <script type="text/javascript" src="js/wysihtml5/bootstrap-wysihtml5.js" ></script>
    <script type="text/javascript" src="js/holder/holder.js"></script>
    <script type="text/javascript" src="dropzone.js"></script>  
    <script>
            function enlazar(file){
                var textoconenlace='<a href="http://adrconsejeros.com/portal/circulares/'+file+'">Pincha aqui para descargar: '+file+'</a>';
                document.getElementById('textoenlaces').value=document.getElementById('textoenlaces').value+textoconenlace;
            }
            $(function() {
                Dropzone.options.uploadzone = {
                    init: function() {
                        this.on("success", function(file) { enlazar(file.name);});
                    },
                    paramName: "file",
                    maxFilesize: "50",
                    addRemoveLinks: true,
                    dictCancelUpload: "Cancelar subida",
                    dictCancelUploadConfirmation: "¿Estas seguro que quiere cancelar la subida?",
                    dictRemoveFile: "Eliminar archivo"
                    
                };
                
            })
        </script>
  </body>
</html>