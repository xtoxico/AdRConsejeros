<?php
	ob_start();
	unlink ('./documentos/'.$_GET['elemento']);
	header ("location: documentosadmin.php?id=".$_GET['id']);
?>