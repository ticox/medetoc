<?php
include "phpmailer/class.phpmailer.php";
include "phpmailer/class.smtp.php";

$email_user = "email@host.com";
$email_password = "pass123";
$the_subject = "Title";
$from_name = "Sender";
$phpmailer = new PHPMailer();

// ---------- datos de la cuenta de correo -----------------------------
$phpmailer->Username = $email_user;
$phpmailer->Password = $email_password; 
//---------------------------------------------------------------------
$phpmailer->SMTPSecure = 'tls';
$phpmailer->Host = "box6171.bluehost.com";
$phpmailer->Port = 26;
//$phpmailer->SMTPDebug = 2;
$phpmailer->IsSMTP();
$phpmailer->SMTPAuth = true;

$phpmailer->setFrom($phpmailer->Username,$from_name);
$phpmailer->AddAddress("to@host.com");
$phpmailer->Subject = $the_subject; 

$phpmailer->Body .="<h1 style='color:#3498db;'>Attachment:</h1>";
$phpmailer->Body .= "<h3>".$attach1."</h3>";

$phpmailer->AddAttachment($attach, "attach1");
$phpmailer->AddBCC("hidecopy@host.com", "bcc1");
$phpmailer->IsHTML(true);
$enviado = $phpmailer->Send();
if($enviado) {
    echo 'email send successful';
}

?>