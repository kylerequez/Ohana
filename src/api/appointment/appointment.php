<?php
require dirname(__DIR__) . '/../config/db-config.php';
require dirname(__DIR__) . '/../database/Database.php';
require dirname(__DIR__) . '/../dao/AppointmentDAO.php';
require dirname(__DIR__) . '/../dao/LogDAO.php';
require dirname(__DIR__) . '/../services/AppointmentServices.php';
require dirname(__DIR__) . '/../services/LogServices.php';
require dirname(__DIR__) . '/../controllers/AppointmentController.php';

$database = new Database($servername, $database, $username, $password);
$dao = new AppointmentDAO($database);
$logdao = new LogDAO($database);
$services = new AppointmentServices($dao);
$logservices = new LogServices($logdao);
$controller = new AppointmentController($services, $logservices);

if($_SERVER["REQUEST_METHOD"] === "GET" && !isset($id))
{
    $controller->processRequest($_SERVER["REQUEST_METHOD"], null);
} elseif($_SERVER["REQUEST_METHOD"] === "GET" && isset($id)) {
    $controller->processRequest($_SERVER["REQUEST_METHOD"], $id);
} elseif($_SERVER["REQUEST_METHOD"] === "POST" && isset($id)) {
    print_r($_POST);
    $controller->processRequest($_SERVER["REQUEST_METHOD"], $id);
}