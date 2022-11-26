<?php

require_once dirname(__DIR__) . '/../config/db-config.php';
require_once dirname(__DIR__) . '/../database/Database.php';
require dirname(__DIR__) . '/../dao/AppointmentDAO.php';
require dirname(__DIR__) . '/../services/AppointmentServices.php';

$database = new Database($servername, $database, $username, $password);
$dao = new AppointmentDAO($database);
$services = new AppointmentServices($dao);

date_default_timezone_set('Asia/Manila');
$now = new DateTime();

$appointments = $services->getScheduledAppointments($now->format('Y-m-d H-i-s'));

if (empty($appointments)) {
    echo "NO APPOINTMENTS TO SEND SMS TO";
} else {
    foreach ($appointments as $appointment) {


        $text = ($appointment->getType() == "REHOMING") ? "
            Aloha, {$appointment->getCustomerName()}!

            Please be advised that you have an appointment at
            {$appointment->getStartDate()->format('M-d-Y H:i')} to {$appointment->getEndDate()->format('H:i')}
            for the purpose of {$appointment->getType()}.
        " : "";

        echo $text;
    //     echo $appointment->getNumber();
    //     $curl = curl_init();
    //     $data = array(
    //         'api_key' => "2I5gtYpVialm2Yjw13yUsDigsny",
    //         'api_secret' => "oCNQjh0tEf7ZZhH8asBkxvvprZkzjd0HVBfGCqYY",
    //         'text' => $text,
    //         'to' => $appointment->getNumber(),
    //         'from' => "OHANA KENNEL PH"
    //     );

    //     curl_setopt_array($curl, array(
    //         CURLOPT_URL => "https://api.movider.co/v1/sms",
    //         CURLOPT_RETURNTRANSFER => true,
    //         CURLOPT_TIMEOUT => 30,
    //         CURLOPT_CUSTOMREQUEST => "POST",
    //         CURLOPT_POSTFIELDS => http_build_query($data),
    //         CURLOPT_HTTPHEADER => array(
    //             "Content-Type: application/x-www-form-urlencoded",
    //             "cache-control: no-cache"
    //         ),
    //     ));

    //     $response = curl_exec($curl);
    //     $err = curl_error($curl);

    //     curl_close($curl);

    //     if ($err) {
    //         echo "cURL Error #:" . $err;
    //     } else {
    //         echo $response;
    //     }
    }
}