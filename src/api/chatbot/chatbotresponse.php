<?php
require dirname(__DIR__) . '/../config/db-config.php';
require dirname(__DIR__) . '/../dao/ChatbotDAO.php';
require dirname(__DIR__) . '/../dao/LogDAO.php';
require dirname(__DIR__) . '/../services/ChatbotServices.php';
require dirname(__DIR__) . '/../services/LogServices.php';
require dirname(__DIR__) . '/../controllers/ChatbotController.php';

$dao = new ChatbotDAO($servername, $database, $username, $password);
$logdao = new LogDAO($servername, $database, $username, $password);
$services = new ChatbotServices($dao);
$logservices = new LogServices($logdao);
$controller = new ChatbotController($services, $logservices);

if($_SERVER["REQUEST_METHOD"] == "GET" && empty($id)){
    $controller->processResponsesRequest($_SERVER["REQUEST_METHOD"], null);
} else if($_SERVER["REQUEST_METHOD"] == "POST" && empty($id)) {
    $controller->processResponsesRequest($_SERVER["REQUEST_METHOD"], null);
} else if ($_SERVER["REQUEST_METHOD"] == "GET" && !empty($id)) {
    $controller->processResponsesRequest($_SERVER["REQUEST_METHOD"], $id);
} else if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($id)) {
    $controller->processResponsesRequest($_SERVER["REQUEST_METHOD"], $id);
}