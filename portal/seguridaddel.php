<?php
  ob_start();
  unlink ('./seguridad/'.$_GET['elemento']);
  header ("location: seguridadadmin.php?id=".$_GET['id']);
?>