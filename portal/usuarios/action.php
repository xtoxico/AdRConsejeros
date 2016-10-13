<?php
ob_start();
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
		header ("location: ../main.php?id=".$_GET['id']);
	}

	/*** acciones ***/


	

	if ($_GET['action']=="adduser"){
		  $sql = 'insert into adr_usuarios (email,nombre,pass,hash) values ("'.$_POST['email'].'","'.$_POST['nombre'].'",AES_ENCRYPT("'.$_POST['passuser'].'","nitrofoska"),md5(now()))';		  
  		  $res = mysqli_query($con,$sql);
  		  //echo $sql;
	}

	if ($_GET['action']=="deluser"){
		  $sql = 'delete from adr_usuarios where id_usuario="'.$_GET['data'].'"';		  
  		  $res = mysqli_query($con,$sql);
	}

	
	header ("location: admin.php?id=".$_GET['id']);
?>
