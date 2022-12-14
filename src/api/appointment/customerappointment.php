<?php
require dirname(__DIR__) . '/../config/db-config.php';
require dirname(__DIR__) . '/../dao/AppointmentDAO.php';
require dirname(__DIR__) . '/../dao/LogDAO.php';
require dirname(__DIR__) . '/../services/AppointmentServices.php';
require dirname(__DIR__) . '/../services/LogServices.php';
require dirname(__DIR__) . '/../controllers/AppointmentController.php';

$dao = new AppointmentDAO($servername, $database, $username, $password);
$logdao = new LogDAO($servername, $database, $username, $password);
$services = new AppointmentServices($dao, null);
$logservices = new LogServices($logdao);
$controller = new AppointmentController($services, $logservices);

if ($_SERVER["REQUEST_METHOD"] === "GET" && !isset($id)) {
    $controller->processUserRequest($_SERVER["REQUEST_METHOD"], null);
} elseif ($_SERVER["REQUEST_METHOD"] === "GET" && isset($id)) {
} elseif ($_SERVER["REQUEST_METHOD"] === "POST" && isset($id)) {
}
