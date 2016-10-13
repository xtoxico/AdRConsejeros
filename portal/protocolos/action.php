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
		header ("location: ../main.php?id=".$_GET['id']);
	}

	/*** acciones ***/


	if ($_GET['action']=="delfolder"){
		  $sql = 'delete from protocolos_carpetas where id_carpeta="'.$_GET['data'].'"';		  
  		  $res = mysqli_query($con,$sql);
	}

	if ($_GET['action']=="addfolder"){
		  $sql = 'insert into protocolos_carpetas (descripcion) values ("'.$_GET['data'].'")';		  
  		  $res = mysqli_query($con,$sql);
	}

	if ($_GET['action']=="delprotocolos"){
		  $sql = 'delete from protocolos where id_protocolos="'.$_GET['data'].'"';		  
  		  $res = mysqli_query($con,$sql);
	}
	

	if ($_GET['action']=="addprotocolos"){
		// pendiente de ver como hacemos la subida y donde lo dejamos
		$files = $_FILES['cirfile'];  		  
		for ($i = 0; $i < sizeof($files['name']); $i++){
			$newname = date('YmdHis',time()).mt_rand().$files['name'][$i];
			move_uploaded_file($files['tmp_name'][$i],'./archivos/'.$newname);		        
			$sql = 'insert into protocolos (descripcion,id_carpeta,ruta) values ("'.$_POST['data'].'","'.$_POST['data2'].'","./archivos/'.$newname.'")';		  
			$res = mysqli_query($con,$sql);		  	
			echo $sql;
		}
	}



	header ("location: admin.php?id=".$_GET['id']);
?>
