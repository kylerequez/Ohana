<?php
require dirname(__DIR__) . '/../config/db-config.php';
require dirname(__DIR__) . '/../dao/LogDAO.php';
require dirname(__DIR__) . '/../dao/StudHistoryDAO.php';
require dirname(__DIR__) . '/../services/LogServices.php';
require dirname(__DIR__) . '/../services/StudHistoryServices.php';
require dirname(__DIR__) . '/../controllers/StudHistoryController.php';

$dao = new StudHistoryDAO($servername, $database, $username, $password);
$logdao = new LogDAO($servername, $database, $username, $password);
$services = new StudHistoryServices($dao);
$logservices = new LogServices($logdao);
$controller = new StudHistoryControler($services, $logservices);

if ($_SERVER['REQUEST_METHOD'] == "POST" && !isset($id)) {
    $controller->processRequest($_SERVER['REQUEST_METHOD'], null);
} else if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($id)) {
    $controller->processRequest($_SERVER['REQUEST_METHOD'], $id);
} else if ($_SERVER['REQUEST_METHOD'] == "GET" && isset($id)) {
    $controller->processRequest($_SERVER['REQUEST_METHOD'], $id);
}
