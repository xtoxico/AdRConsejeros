
<?php
    $host_name  = "db616940201.db.1and1.com";
  //  $host_name  = "localhost";

    $database   = "db616940201";
    $user_name  = "dbo616940201";
  //  $user_name  = "root";
  
    $password   = "nitrofoska";
  //  $password   = "";
  


    $con = mysqli_connect($host_name, $user_name, $password, $database);
    setlocale(LC_ALL,'es_ES');                      
    mysqli_query($con,"SET NAMES 'utf8'");    
    if(mysqli_connect_errno())
    {
    echo '<p>Verbindung zum MySQL Server fehlgeschlagen: '.mysqli_connect_error().'</p>';
    }

?>    