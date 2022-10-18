<?php
require dirname(__DIR__) . '/../config/db-config.php';
require dirname(__DIR__) . '/../database/Database.php';
require dirname(__DIR__) . '/../dao/BoardingSlotDAO.php';
require dirname(__DIR__) . '/../dao/LogDAO.php';
require dirname(__DIR__) . '/../services/BoardingSlotServices.php';
require dirname(__DIR__) . '/../services/LogServices.php';
require dirname(__DIR__) . '/../controllers/BoardingSlotController.php';

$database = new Database($servername, $database, $username, $password);
$dao = new BoardingSlotDAO($database);
$logdao = new LogDAO($database);
$services = new BoardingSlotServices($dao);
$logservices = new LogServices($logdao);
$controller = new BoardingSlotController($services, $logservices);

if($_SERVER["REQUEST_METHOD"] == "GET" && empty($id)){
    // get boarding slots
    echo "GET DISPLAY";
    $controller->processRequest($_SERVER["REQUEST_METHOD"], null);
} else if ($_SERVER["REQUEST_METHOD"] == "POST" && empty($id)){
    // add boarding slot
    echo "POST ADD";
    $controller->processRequest($_SERVER["REQUEST_METHOD"], null);
}else if($_SERVER["REQUEST_METHOD"] == "GET" && !empty($id)) {
    echo "TEST";
    $controller->processRequest($_SERVER["REQUEST_METHOD"], $id);
}