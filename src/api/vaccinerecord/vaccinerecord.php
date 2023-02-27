<?php

include_once dirname(__DIR__) . '/../config/db-config.php';
include_once dirname(__DIR__) . '/../dao/LogDAO.php';
include_once dirname(__DIR__) . '/../dao/VaccineRecordDAO.php';
include_once dirname(__DIR__) . '/../services/LogServices.php';
include_once dirname(__DIR__) . '/../services/VaccineRecordServices.php';
include_once dirname(__DIR__) . '/../controllers/VaccineRecordController.php';

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$dao = new VaccineRecordDAO($servername, $database, $username, $password);
$logdao = new LogDAO($servername, $database, $username, $password);
$services = new VaccineRecordServices($dao);
$logservices = new LogServices($logdao);
$controller = new VaccineRecordController($services, $logservices);

if ($_SERVER['REQUEST_METHOD'] == "POST" && !isset($id)) {
    $controller->processRequest($_SERVER['REQUEST_METHOD'], null);
} else if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($id)) {
    $controller->processRequest($_SERVER['REQUEST_METHOD'], $id);
} else if ($_SERVER['REQUEST_METHOD'] == "GET" && isset($id)) {
    $controller->processRequest($_SERVER['REQUEST_METHOD'], $id);
}
