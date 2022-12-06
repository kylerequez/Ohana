<?php
require_once dirname(__DIR__) . '/../config/app-config.php';
require_once dirname(__DIR__) . '/../config/db-config.php';
require_once dirname(__DIR__) . '/../database/Database.php';
require_once dirname(__DIR__) . '/../dao/AppointmentDAO.php';
require_once dirname(__DIR__) . '/../services/AppointmentServices.php';
require_once dirname(__DIR__) . '/../vendor/autoload.php';

// $client = new \GuzzleHttp\Client();
// $response = $client->request('POST', 'https://api.movider.co/v1/balance', [
//     'form_params' => [
//         'api_secret' => API_SECRET,
//         'api_key' => API_KEY
//     ],
//     'headers' => [
//         'accept' => 'application/json',
//         'content-type' => 'application/x-www-form-urlencoded',
//     ],
// ]);
// $balance = json_decode($response->getBody(), true);

// print_r($balance);

// if ($balance["amount"] > 0.10) {
//     date_default_timezone_set('Asia/Manila');
//     $database = new Database($servername, $database, $username, $password);
//     $dao = new AppointmentDAO($database);
//     $services = new AppointmentServices($dao);
//     $now = new DateTime();
//     $appointments = $services->getScheduledAppointments($now->format('Y-m-d H-i-s'));
//     if (!empty($appointments) && !is_null($appointments)) {
//         foreach ($appointments as $appointment) {
//             $type = strtolower($appointment->getType());
//             $text =
//                 ($appointment->getType() == "REHOMING") ?
//                 "Aloha, {$appointment->getCustomerName()}!
            
//             Please be advised that you have a scheduled {$type} at {$appointment->getStartDate()->format('M-d-Y H:i A')} to {$appointment->getEndDate()->format('H:i A')}"
//                 :
//                 "Aloha, {$appointment->getCustomerName()}
            
//             Please be advised that you have a scheduled {$type} at {$appointment->getStartDate()->format('M-d-Y H:i A')} to {$appointment->getEndDate()->format('H:i A')}";

            
//         }
//     }
// }

$ch = curl_init();
$parameters = array(
    'apikey' => 'ac52fa794b80cecfc29fe5c3cbcd00cb', //Your API KEY
    'number' => '+639950244626',
    'message' => 'I just sent my first message with Semaphore',
    'sendername' => 'SEMAPHORE'
);
curl_setopt( $ch, CURLOPT_URL,'https://semaphore.co/api/v4/messages' );
curl_setopt( $ch, CURLOPT_POST, 1 );

//Send the parameters set above with the request
curl_setopt( $ch, CURLOPT_POSTFIELDS, http_build_query( $parameters ) );

// Receive response from server
curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );
$output = curl_exec( $ch );
curl_close ($ch);

// $database = new Database($servername, $database, $username, $password);
// $dao = new AppointmentDAO($database);
// $services = new AppointmentServices($dao);

// date_default_timezone_set('Asia/Manila');
// $now = new DateTime();

// $appointments = $services->getScheduledAppointments($now->format('Y-m-d H-i-s'));

// if (empty($appointments)) {
//     echo "NO APPOINTMENTS TO SEND SMS TO";
// } else {
//     foreach ($appointments as $appointment) {


//         $text = ($appointment->getType() == "REHOMING") ? "
//             Aloha, {$appointment->getCustomerName()}!

//             Please be advised that you have an appointment at
//             {$appointment->getStartDate()->format('M-d-Y H:i')} to {$appointment->getEndDate()->format('H:i')}
//             for the purpose of {$appointment->getType()}.
//         " : "";

//         echo $text;
//         //     echo $appointment->getNumber();
//         //     $curl = curl_init();
//         //     $data = array(
//         //         'api_key' => "2I5gtYpVialm2Yjw13yUsDigsny",
//         //         'api_secret' => "oCNQjh0tEf7ZZhH8asBkxvvprZkzjd0HVBfGCqYY",
//         //         'text' => $text,
//         //         'to' => $appointment->getNumber(),
//         //         'from' => "OHANA KENNEL PH"
//         //     );

//         //     curl_setopt_array($curl, array(
//         //         CURLOPT_URL => "https://api.movider.co/v1/sms",
//         //         CURLOPT_RETURNTRANSFER => true,
//         //         CURLOPT_TIMEOUT => 30,
//         //         CURLOPT_CUSTOMREQUEST => "POST",
//         //         CURLOPT_POSTFIELDS => http_build_query($data),
//         //         CURLOPT_HTTPHEADER => array(
//         //             "Content-Type: application/x-www-form-urlencoded",
//         //             "cache-control: no-cache"
//         //         ),
//         //     ));

//         //     $response = curl_exec($curl);
//         //     $err = curl_error($curl);

//         //     curl_close($curl);

//         //     if ($err) {
//         //         echo "cURL Error #:" . $err;
//         //     } else {
//         //         echo $response;
//         //     }
//     }
// }
