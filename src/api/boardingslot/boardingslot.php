<?php
require dirname(__DIR__) . '/../config/db-config.php';
require dirname(__DIR__) . '/../dao/BoardingSlotDAO.php';
require dirname(__DIR__) . '/../dao/LogDAO.php';
require dirname(__DIR__) . '/../services/BoardingSlotServices.php';
require dirname(__DIR__) . '/../services/LogServices.php';
require dirname(__DIR__) . '/../controllers/BoardingSlotController.php';

$dao = new BoardingSlotDAO($servername, $database, $username, $password);
$logdao = new LogDAO($servername, $database, $username, $password);
$services = new BoardingSlotServices($dao);
$logservices = new LogServices($logdao);
$controller = new BoardingSlotController($services, $logservices);

if ($_SERVER["REQUEST_METHOD"] == "GET" && empty($id)) {
    $controller->processRequest($_SERVER["REQUEST_METHOD"], null);
} else if ($_SERVER["REQUEST_METHOD"] == "POST" && empty($id)) {
    $controller->processRequest($_SERVER["REQUEST_METHOD"], null);
} else if ($_SERVER["REQUEST_METHOD"] == "GET" && !empty($id)) {
    $controller->processRequest($_SERVER["REQUEST_METHOD"], $id);
} else if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($id)) {
    $controller->processRequest($_SERVER["REQUEST_METHOD"], $id);
}
