<?php
	require_once ("conect.php");
	$sql = 'select * from adr_usuarios where email="'.$_POST['email'].'" and AES_DECRYPT(pass,"nitrofoska")="'.$_POST['pass'].'"';
	$res = mysqli_query($con,$sql);
	$num = mysqli_num_rows($res);
	$row = mysqli_fetch_array($res);
	if ($num==1){
		header("location: main.php?id=".$row['hash']);	
		?>

		<html>
				
			 <head>
  					 <title>ADR Consejeros - Portal de Clientes</title>

				    <!-- Bootstrap -->
				    <link href="css/bootstrap.min.css" rel="stylesheet">
				    <link href="css/font-awesome.css"  rel ="stylesheet">
			  <meta http-equiv="Refresh" content="1;url=http://adrconsejeros.es/portal/main.php?id=<?php echo $row['hash']?>">

			 </head>

			 <body>

			  <h3 align="center">Verificación de usuario Correcta. Te dirigimos al portal <br> Pulsa en el siguiente enlace si no quieres esperar

			  <a href="http://adrconsejeros.es/portal/main.php?id=<?php echo $row['hash']?>">Portal de usuarios</a></h3>

			 </body>

			</html>



		<?php	
	}else{
		header("location: main.php");
		?>

		<html>
				
			 <head>
  					 <title>ADR Consejeros - Portal de Clientes</title>

				    <!-- Bootstrap -->
				    <link href="css/bootstrap.min.css" rel="stylesheet">
				    <link href="css/font-awesome.css"  rel ="stylesheet">
			  <meta http-equiv="Refresh" content="10;url=http://adrconsejeros.es/portal/main.php">

			 </head>

			 <body>

			  <h3 align="center">Tu usuario y contraseña no son correctos te volvemos a redirigir al portal de usuarios en 10 segundos.<br> Pulsa en el siguiente enlace si no quieres esperar

			  <a href="http://adrconsejeros.es/portal/main.php">Portal de usuarios</a></h3>

			 </body>

			</html>



		<?php



	}
	


?>