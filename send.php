<?php
    
    require("clases/class.phpmailer.php");
    print_r($_POST);
        $mail = new PHPMailer();
        //$mail->IsSMTP();  // telling the class to use SMTP

        $mail->IsSendmail();
        $mail->SMTPAuth = true;
        $mail->SMTPSecure = "tsl";
        $mail->Host     = "smtp.1and1.es"; // SMTP server
        $mail->Port = 587;
        $mail->Username = "antoniotirado@institutodeinnovacion.es";
        $mail->Password = "ed21ttnd";
        $mail->From     = "josecmedina@adrconsejeros.com";
        $mail->isHTML(true);
        $mail->CharSet = "UTF-8";
        $mail->AddAddress('josecmedina@adrconsejeros.es');
        
        
        $mail->FromName = "Web de ADR CONSEJEROS";
        $mail->Subject  = "Formulario de contacto";
        $mail->Body     = "Email: ".$_POST['inputEmail'].'<br>'.$_POST['inputConsulta'];
        $mail->WordWrap = 50;
        //SI EL EMAIL SE ENVIA
        if(!$mail->Send()) {
            $mail->errorMessage();   
        } 
        unset($mail);
    
?>       
