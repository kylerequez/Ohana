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
$mail->Body = "
<b style=\"color:#db6551;\">From:</b> " . trim($_POST["name"]) . "<br>
<br>
<b style=\"color:#db6551;\">Email:</b> " . trim($_POST["email"]) . "<br>
<br>
<b style=\"color:#db6551;\">Message:</b> " . trim($_POST["message"]) . "<center>
<br><br> Ohana Kennel PH will NOT initiate emails or sms that will ask your bank account details. 
<br> - Do not give your email address,password and OTP to other people. 
<br> - Do not click on suspicious links.
<br><br> <b>Note:</b>For inquiries and questions, do not hesitate to email us at ohana.kennel.business@gmail.com
<br><br>
<img src=\"https://lh3.googleusercontent.com/Bgt7glsz4TKk1bom8LB9I3tpIYqnQ2ZQ3qwQcp0xhUavCEantbg2g_dOA0i_8NuhjA8=w2400\"></center>";

$mail->AltBody = 'Inquiry from ' . trim($_POST["name"]);
if (!isset($_SESSION)) session_start();
if (!$mail->send()) {
    $_SESSION["msg"] = "There was an error in sending your message. Please try again.";
} else {
    $_SESSION["msg"] = "You have successfully sent an email to Ohana Kennel PH. Thank you for your message.";
}
if (str_contains($_SERVER['HTTP_REFERER'], '/contact')) {
    header('Location: ' . $_SERVER["HTTP_REFERER"]);
    exit();
} else {
    header('Location: ' . $_SERVER["HTTP_REFERER"] . '#contact');
    exit();
}
