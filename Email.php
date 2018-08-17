<?php
include "lib/email/class.phpmailer.php";
include "lib/email/class.smtp.php";

$email_user = "info@cotedem.com";
$email_password = "Cotedem@2018";
$the_subject = "Contacto Por Pagina web";
$from_name = "Sender";
$attach1 = "prueba de envio de email";
$phpmailer = new PHPMailer();

// ---------- datos de la cuenta de correo -----------------------------
$phpmailer->Username = $email_user;
$phpmailer->Password = $email_password; 
//---------------------------------------------------------------------
$phpmailer->SMTPSecure = 'ssl';
$phpmailer->Host = "box308.bluehost.com";
$phpmailer->Port = 465;
//$mail->Port = 465; $mail->SMTPSecure = 'ssl';
//$phpmailer->SMTPDebug = 2;
$phpmailer->IsSMTP();
$phpmailer->SMTPAuth = true;

$phpmailer->setFrom($phpmailer->Username,$from_name);
$phpmailer->AddAddress("soporte@cotedem.com");
$phpmailer->Subject ="Prueba"; 

$phpmailer->Body .="<h1 style='color:#3498db;'>Attachment:</h1>";
$phpmailer->Body .= "<h3>".$attach1."</h3>";

$phpmailer->AddAttachment($attach1, "attach1");
$phpmailer->AddBCC("soporte@cotedem.com", "bcc1");
$phpmailer->IsHTML(true);
$enviado = $phpmailer->Send();
if($enviado) {
    echo 'email send successful';
}

?>