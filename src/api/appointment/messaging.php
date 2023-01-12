<?php
require_once dirname(__DIR__) . '/../config/app-config.php';
require_once dirname(__DIR__) . '/../config/db-config.php';
require_once dirname(__DIR__) . '/../dao/AppointmentDAO.php';
require_once dirname(__DIR__) . '/../services/AppointmentServices.php';
require_once dirname(__DIR__) . '/../config/app-config.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

include_once dirname(__DIR__) . '/../vendor/autoload.php';

date_default_timezone_set('Asia/Manila');
$dao = new AppointmentDAO($servername, $database, $username, $password);
$services = new AppointmentServices($dao, null);

$ch = curl_init();
$parameters = array(
    'apikey' => SEMAPHORE_API_KEY,
);
curl_setopt($ch, CURLOPT_URL, 'https://api.semaphore.co/api/v4/account' . '?' . http_build_query($parameters));
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$output = curl_exec($ch);
curl_close($ch);

$output = json_decode($output, true);
$balance = $output['credit_balance'];

echo "Your current balance is: $balance<br>";
if (!isset($balance)) {
    echo "You have exceeded the maximum number of request for checking balance. Please try again after 10 minutes.";
    exit();
}
if (isset($balance) && $balance <= 10) {
    echo "Sorry, but you currently have an account balance less than or equal to 10. Please add more credits to your Semaphore account in order to continue using their SMS services.<br>";
    $mail = new PHPMailer();
    $mail->isSMTP();
    $mail->SMTPDebug = SMTP::DEBUG_OFF;
    $mail->Host = 'smtp.gmail.com';
    $mail->Port = 465;
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
    $mail->SMTPAuth = true;
    $mail->Username = EMAIL_USERNAME;
    $mail->Password = EMAIL_KEY;
    $mail->setFrom(EMAIL_USERNAME);
    $mail->addAddress(EMAIL_USERNAME);
    $mail->Subject = 'Ohana Kennel PH - Semaphore Insufficient Credits';
    $mail->Body = "<center> <span style=\"font-size:20px;\"> Your Semaphore Account Credit is: </span> <br>
                    <b style=\"font-size:30px;color:#db6551;\">$balance</b>
                    <br><span style=\"font-size:20px;\"> You need to have more than 10 credits in order to use the Sempahore SMS services. </span><br>
                    <br><span style=\"font-size:20px;\"> Purchase credits at <a href=\"https://semaphore.co/\">https://semaphore.co/</a>.</span><br>
                    <br><br>
                    <br> Ohana Kennel PH will NOT initiate emails or sms that will ask your bank account details. 
                    <br> - Do not give your email address,password and OTP to other people. 
                    <br> - Do not click on suspicious links.
                    <br><br> <b>Note:</b> For inquiries and questions, do not hesitate to email us at ohanakennelph.business@gmail.com
                    <br><br>
                    <img src=\"https://lh3.googleusercontent.com/Bgt7glsz4TKk1bom8LB9I3tpIYqnQ2ZQ3qwQcp0xhUavCEantbg2g_dOA0i_8NuhjA8=w2400\"> </center>";
    $mail->AltBody = 'Ohana Kennel PH - Semaphore API balance';
    if (!$mail->send()) {
        echo "There was an error in sending the email regarding the balance.";
    }
    exit();
}
$now = new DateTime();
$appointments = $services->getScheduledAppointments($now->format('Y-m-d H-i-s'));
if (empty($appointments) && is_null($appointments)) {
    echo "There were no appointments scheduled for today.";
    exit();
}
foreach ($appointments as $appointment) {
    $type = strtolower($appointment->getType());
    $text =
        ($appointment->getType() == "REHOMING") ?
        "Aloha, {$appointment->getCustomerName()}!

                Please be advised that you have a scheduled {$type} at {$appointment->getStartDate()->format('M-d-Y h:i A')} to {$appointment->getEndDate()->format('h:i A')}"
        :
        "Aloha, {$appointment->getCustomerName()}!

                Please be advised that you have a scheduled {$type} at {$appointment->getStartDate()->format('M-d-Y h:i A')} to {$appointment->getEndDate()->format('h:i A')}";

    $ch = curl_init();
    $parameters = array(
        'apikey' => SEMAPHORE_API_KEY,
        'number' => $appointment->getNumber(),
        'message' => $text,
        'sendername' => 'OhanaKennel'
    );
    curl_setopt($ch, CURLOPT_URL, 'https://semaphore.co/api/v4/messages');
    curl_setopt($ch, CURLOPT_POST, 1);

    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($parameters));

    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $output = curl_exec($ch);
    curl_close($ch);

    echo $output;
    echo "<br>";
}
exit();
