<?php
require_once dirname(__DIR__) . '/../config/app-config.php';
require_once dirname(__DIR__) . '/../config/db-config.php';
require_once dirname(__DIR__) . '/../dao/AppointmentDAO.php';
require_once dirname(__DIR__) . '/../services/AppointmentServices.php';

date_default_timezone_set('Asia/Manila');
$dao = new AppointmentDAO($servername, $database, $username, $password);
$services = new AppointmentServices($dao, null);

$ch = curl_init();
$parameters = array(
    'apikey' => 'ac52fa794b80cecfc29fe5c3cbcd00cb',
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
    echo "Sorry, but you currently have an account balance less than or equal to 10. Please add more credits to your Semaphore account in order to continue using their SMS services.";
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
        'apikey' => 'ac52fa794b80cecfc29fe5c3cbcd00cb',
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
