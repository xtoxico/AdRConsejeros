
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
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.css"  rel ="stylesheet">
    <link rel="stylesheet" type="text/css" href="dist/bootstrap3-wysihtml5.min.css"></link>

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

  .btn.jumbo {
    font-size: 20px;
    font-weight: normal;
    padding: 14px 24px;
    margin-right: 10px;
    -webkit-border-radius: 6px;
    -moz-border-radius: 6px;
    border-radius: 6px;
  }
</style>
  </style>

  </head>
  <body>    
  <?php
    require_once "navbar.php";
          
  ?>
    <div class="container">
      <div class="row-fluid">
        <div class="col-md-12">
                <h3>Enlaces de interes</h3>             
                
                
                <textarea class="textarea" placeholder="Enter text ..." style="width: 100%; height: 200px; font-size: 14px; line-height: 18px;">
                    <ul>
                        <?php
                        //$con=conectar();
                        $sql="select data from enlaces where id=1";
                        $res=mysqli_query($con,$sql);
                        while ($row=mysqli_fetch_array($res)){
                            echo $row['data'];
                        }
                        ?>                        
                    </ul>
                </textarea><br>
                <button id="guardar" class="btn btn-default">Guardar enlaces</button>
            
        </div>
      </div>
    </div>



    <script src="dist/wysihtml5x-toolbar.min.js"></script>
<script src="dist/jquery.min.js"></script>
<script src="dist/bootstrap.min.js"></script>
<script src="dist/handlebars.runtime.min.js"></script>
<script src="dist/bootstrap3-wysihtml5.min.js"></script>         
    
    <script>
        id = <?php echo $_GET['id'];?>;
        $('.textarea').wysihtml5({
            toolbar: {
            fa: true
            }
        });
        $('.delcircular').click(function(){
            if(confirm("¿Deseas Eliminar esta circular?")){
                window.location='action.php?id='+id+'&action=delcircular&data='+$(this).attr('data');
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