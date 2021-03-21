<?php

require 'connection.php';
//Include required PHPMailer files
	require 'includes/PHPMailer.php';
	require 'includes/SMTP.php';
	require 'includes/Exception.php';
//Define name spaces
	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\SMTP;
	use PHPMailer\PHPMailer\Exception;
$conn = Connect();


$email = $conn->real_escape_string($_POST['email']);

$query = "INSERT into register(email) VALUES('$email')";
$success = $conn->query($query);
$mail = new PHPMailer();
//Set mailer to use smtp
	$mail->isSMTP();
//Define smtp host
	
	$mail->Host = "smtp.gmail.com";
//Enable smtp authentication
	$mail->SMTPAuth = true;
//Set smtp encryption type (ssl/tls)
	$mail->SMTPSecure = "tls";
//Port to connect smtp
	$mail->Port = "587";
//Set gmail username
	$mail->Username = "cyberskull44@gmail.com";
//Set gmail password
	$mail->Password = "chetu_batra@mudit44";
//Email subject
	$mail->Subject = "Registered";
//Set sender email
	$mail->setFrom('cyberskull44@gmail.com');
//Enable HTML
	$mail->isHTML(true);
//Attachment

//Email body
	$mail->Body = "<h1>You have successfully registered to Cyber Skull</h1></br><h2>Thank You</h2>";
//Add recipient
	$mail->addAddress($_POST['email']);
//Finally send email
	if ( $mail->send() ) {
		echo "Email Sent..!";
	}else{
		echo 'Mailer Error: ' . $mail->ErrorInfo;
	}
//Closing smtp connection
	$mail->smtpClose();


if (!$success){
	die("Couldnt enter data: ".$conn->error);
}

$conn->close();
header('Location: index.html');
?>
