<?php
    include($_SERVER['DOCUMENT_ROOT']."/clases/conect.php");
    include($_SERVER['DOCUMENT_ROOT']."/email.php");    
    require($_SERVER['DOCUMENT_ROOT']."/clases/class.phpmailer.php");
    
    //Genero contraseña
    //Establecemos zona horaria por defecto
    $con=conectar();
    $sql='select email,AES_DECRYPT ( passencode , "zagetrep" ) as clave FROM normaweb_registro where email="'.$_GET['email'].'"';
    $res=mysql_query($sql);
    while ($row=mysql_fetch_array($res)){

            $mail = new PHPMailer();
            //$mail->IsSMTP();  // telling the class to use SMTP

            $mail->IsSendmail();
            $mail->SMTPAuth = true;
    		$mail->SMTPSecure = "tsl";
           	$mail->Host     = "smtp.1and1.es"; // SMTP server
            $mail->Port = 587;
            $mail->Username = "josecmedina@adrconsejeros.com";
            $mail->Password = "nitrofoska";
            $mail->From     = "josecmedina@adrconsejeros.com";
            $mail->isHTML(true);
            $mail->CharSet = "UTF-8";
            $mail->AddAddress('josecmedina@adrconsejeros.com');
            
            
            $mail->FromName = "Web de ADR CONSEJEROS";
            $mail->Subject  = "Formulario de contacto";
            $mail->Body     = "Email: ".$_POST['inputEmail'].'<br>'.$_POST['inputConsulta'];
            $mail->WordWrap = 50;
            //SI EL EMAIL SE ENVIA
            if(!$mail->Send()) {
                $mail->errorMessage();   
            } else {
                //echo $row['email'];
                //echo $row['clave'];
            }
            unset($mail);
    }
?>


        <html>
                
             <head>
                     <title>ADR Consejeros </title>

                    <!-- Bootstrap -->
                    <link href="css/bootstrap.min.css" rel="stylesheet">
                    <link href="css/font-awesome.css"  rel ="stylesheet">
              <meta http-equiv="Refresh" content="4;url=http://adrconsejeros.es">

             </head>

             <body>

              <h3 align="center">Envio realizado con éxito, en la mayor brevedad posible nos pondremos en contacto con usted.<br>

              <a href="http://adrconsejeros.es">Regresar</a></h3>

             </body>

            </html>
