<?php
include_once dirname(__DIR__) . '/../config/db-config.php';
include_once dirname(__DIR__) . '/../dao/AppointmentDAO.php';
include_once dirname(__DIR__) . '/../dao/LogDAO.php';
include_once dirname(__DIR__) . '/../services/AppointmentServices.php';
include_once dirname(__DIR__) . '/../services/LogServices.php';
include_once dirname(__DIR__) . '/../controllers/AppointmentController.php';

$dao = new AppointmentDAO($servername, $database, $username, $password);
$logdao = new LogDAO($servername, $database, $username, $password);
$services = new AppointmentServices($dao, null);
$logservices = new LogServices($logdao);
$controller = new AppointmentController($services, $logservices);

if ($_SERVER["REQUEST_METHOD"] === "GET" && !isset($id)) {
    $controller->processRequest($_SERVER["REQUEST_METHOD"], null);
} elseif ($_SERVER["REQUEST_METHOD"] === "GET" && isset($id)) {
    $controller->processRequest($_SERVER["REQUEST_METHOD"], $id);
} elseif ($_SERVER["REQUEST_METHOD"] === "POST" && isset($id)) {
    $controller->processRequest($_SERVER["REQUEST_METHOD"], $id);
}
