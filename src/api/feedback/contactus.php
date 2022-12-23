<?php
include_once dirname(__DIR__) . '/../config/app-config.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

include_once dirname(__DIR__) . '/../vendor/autoload.php';

$mail = new PHPMailer();
$mail->isSMTP();
$mail->SMTPDebug = SMTP::DEBUG_OFF;
$mail->Host = 'smtp.gmail.com';
$mail->Port = 465;
$mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
$mail->SMTPAuth = true;
$mail->Username = EMAIL_USERNAME;
$mail->Password = EMAIL_KEY;
$mail->setFrom(trim($_POST["email"]), trim($_POST["name"]));
$mail->addAddress(EMAIL_USERNAME);
$mail->Subject = 'Inquiry from ' . trim($_POST["name"]);
$mail->Body = "From: " . trim($_POST["name"]) . "<br>
<br>
Email: " . trim($_POST["email"]) . "<br>
<br>
Message: " . trim($_POST["message"]);
$mail->AltBody = 'Inquiry from ' . trim($_POST["name"]);
if (!isset($_SESSION)) session_start();
if (!$mail->send()) {
    $_SESSION["msg"] = "There was an error in sending your message. Please try again.";
} else {
    $_SESSION["msg"] = "You have successfully sent an email to Ohana Kennel PH. Thank you for your message.";
}
if(str_contains($_SERVER['HTTP_REFERER'], '/contact')) {
    header('Location: ' . $_SERVER["HTTP_REFERER"]);
} else {
    header('Location: ' . $_SERVER["HTTP_REFERER"] . '#contact');
}

