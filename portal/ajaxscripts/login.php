<?php
include "../conect.php";
$sql = 'select email,hash,usuario from usuarios where email="'.$_POST['email'].'" and pass=AES_DECRYPT("'.$_POST['pass'].'","nitrofoska")';
$res = mysqli_query($con,$sql);
$row = mysqli_fetch_array($res);

echo json_encode($row);

?>