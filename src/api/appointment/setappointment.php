<?php
require dirname(__DIR__) . '/../config/db-config.php';
require dirname(__DIR__) . '/../dao/AppointmentDAO.php';
require dirname(__DIR__) . '/../dao/PetProfileDAO.php';
require dirname(__DIR__) . '/../dao/LogDAO.php';
require dirname(__DIR__) . '/../services/AppointmentServices.php';
require dirname(__DIR__) . '/../services/LogServices.php';
require dirname(__DIR__) . '/../controllers/AppointmentController.php';

$dao = new AppointmentDAO($servername, $database, $username, $password);
$petProfile = new PetProfileDAO($servername, $database, $username, $password);
$logdao = new LogDAO($servername, $database, $username, $password);
$services = new AppointmentServices($dao, $petProfile);
$logservices = new LogServices($logdao);
$controller = new AppointmentController($services, $logservices);

if ($_SERVER["REQUEST_METHOD"] == "POST" && $type == "VISIT") {
    $controller->processVisitRequest($_SERVER["REQUEST_METHOD"]);
} else if ($_SERVER["REQUEST_METHOD"] == "POST" && $type == "STUD") {
    // $controller->processStudRequest($_SERVER["REQUEST_METHOD"]);
} else if ($_SERVER["REQUEST_METHOD"] == "POST" && $type == "REHOMING") {
    $controller->processRehomingRequest($_SERVER["REQUEST_METHOD"]);
}
