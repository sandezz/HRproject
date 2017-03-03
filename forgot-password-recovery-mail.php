<?php
if(!class_exists('PHPMailer')) {
    require('phpmailer/class.phpmailer.php');
	require('phpmailer/class.smtp.php');
}

require_once("mail_configuration.php");

$mail = new PHPMailer();

$emailBody = "<div>" . $user["username"] . ",<br><br><p>Click this link to recover your password<br><a href='" . PROJECT_HOME . "?name=" . $user["username"] . "'>" . PROJECT_HOME . "?name=" . $user["username"] . "</a><br><br></p>Regards,<br> Admin.</div>";

$mail->IsSMTP();
$mail->SMTPDebug = 1;
$mail->SMTPAuth = TRUE;
$mail->SMTPSecure = 'ssl';   
$mail->Port     = 465;  
$mail->Username = "abctest444@gmail.com";
$mail->Password = "abcdtest";
$mail->Host     = "smtp.gmail.com";
$mail->Mailer   = "smtp";


$mail->SetFrom ("abctest444@gmail.com","HRMS ");
$mail->AddReplyTo = 'bdahal@sevadev.com';
$mail->ReturnPath = "wa@gmail.com";	
$mail->AddAddress("$user[email]");
$mail->Subject = "Forgot Password  Recovery";		
$mail->MsgHTML($emailBody);
$mail->IsHTML(true);

if(!$mail->Send()) {
	$error_message = 'Problem in Sending Password Reset Email';
} else {
	$success_message = 'Success!Please check your email!';
}

?>
