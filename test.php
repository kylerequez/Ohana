<?php



if ($_SERVER["REQUEST_METHOD"] == "POST") {
    echo "POST";
    print_r($_POST);
    $time = $_POST["appointmentTime"];

    $time = explode(" - ", $_POST["appointmentTime"]);
    print_r($time);

    $start = new DateTime($_POST["date"] . " " . $time[0]);
    $end = new DateTime($_POST["date"] . " " . $time[1]);

    echo $start->format('M-d-Y H:i A');
    echo $end->format('M-d-Y H:i A');
} else {
    echo "GET";
}
