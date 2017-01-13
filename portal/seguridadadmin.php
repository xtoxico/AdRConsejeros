
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
          <h3>Administracion de Kits seguridad y señalización</h3>
          <div class="col-md-10 col-md-offset-1">
            <h4 style="font-family: helvetica; font-size: 14px; font-weight: bold">Subir documentos de interes</h4>
            <form action="documentosupload.php" id="uploadzone" class="dropzone" style="border: solid 1px #565656; margin: 10px"></form>                                                            
          </div>

            <table class="table table-hover" style="width: 100%">
            <thead style="font-weight: bold"><tr><td style="width:90%">Titulo</td><td></td></tr></thead>
           <?php
              $dir = opendir('seguridad');
              $numelem=0;
              // Leo todos los ficheros de la carpeta
              while ($elemento = readdir($dir)){
                  if( $elemento != "." && $elemento != ".."){
                      echo '<tr><td>'.$elemento.'</td><td><a class="deldocumento" href="#" data="'.$elemento.'">Eliminar</td></tr>';
                  }
              }
          ?>
                
            </table>
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
                var textoconenlace='<a href="http://adrconsejeros.com/portal/seguridad/'+file+'">Pincha aqui para descargar: '+file+'</a>';
                document.getElementById('textoenlaces').value=document.getElementById('textoenlaces').value+textoconenlace;
            }

            $('.deldocumento').click(function(){
              if(confirm("¿Deseas Eliminar este documento?")){
                  window.location='seguridaddel.php?id=<?php echo $_GET['id']?>&elemento='+$(this).attr('data');
              }
            })


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