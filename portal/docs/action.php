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


	if ($_GET['action']=="delfolder"){
		  $sql = 'delete from circulares_carpetas where id_carpeta="'.$_GET['data'].'"';		  
  		  $res = mysqli_query($con,$sql);
	}

	if ($_GET['action']=="addfolder"){
		  $sql = 'insert into circulares_carpetas (descripcion) values ("'.$_GET['data'].'")';		  
  		  $res = mysqli_query($con,$sql);
	}

	if ($_GET['action']=="upfolder"){
		  $sql = 'update circulares_carpetas set descripcion="'.$_GET['data'].'" where id_carpeta="'.$_GET['idfolder'].'"';		  
  		  $res = mysqli_query($con,$sql);
	}

	if ($_GET['action']=="delcircular"){
		  $sql = 'delete from circulares where id_circular="'.$_GET['data'].'"';		  
  		  $res = mysqli_query($con,$sql);
	}

	if ($_GET['action']=="addfolder"){
		  $sql = 'insert into circulares (descripcion,id_carpeta) values ("'.$_GET['data'].'","'.$_GET['data2'].'")';		  
  		  $res = mysqli_query($con,$sql);
	}

	if ($_GET['action']=="delfichero"){
		  $sql = 'delete from circulares_ficheros where id_fichero="'.$_GET['data'].'"';		  
  		  $res = mysqli_query($con,$sql);
	}

	if ($_GET['action']=="addcircular"){
		// pendiente de ver como hacemos la subida y donde lo dejamos
		  $sql = 'insert into circulares (descripcion,id_carpeta) values ("'.$_POST['data'].'","'.$_POST['data2'].'")';		  
  		  $res = mysqli_query($con,$sql);
  		  $circular=mysqli_insert_id($con);
  		  
  		  $files = $_FILES['cirfile'];  		  
  		  for ($i = 0; $i < sizeof($files['name']); $i++){
  		  		
  		  	
		        $newname = date('YmdHis',time()).mt_rand().$files['name'][$i];
		        move_uploaded_file($files['tmp_name'][$i],'./archivos/'.$newname);
		        $sql = 'insert into circulares_ficheros (id_circular,ruta,descripcion) values ("'.$circular.'","./archivos/'.$newname.'","'.$files['name'][$i].'")';		    		  		
  		  		$res = mysqli_query($con,$sql);
		  }
	}



	header ("location: admin.php?id=".$_GET['id']);
?>
