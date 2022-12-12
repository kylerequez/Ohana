<?php

require dirname(__DIR__) . '/../config/db-config.php';
require dirname(__DIR__) . '/../dao/PetProfileDAO.php';
require dirname(__DIR__) . '/../dao/LogDAO.php';
require dirname(__DIR__) . '/../services/PetProfileServices.php';
require dirname(__DIR__) . '/../services/LogServices.php';
require dirname(__DIR__) . '/../controllers/PetProfileController.php';

$dao = new PetProfileDAO($servername, $database, $username, $password);
$logdao = new LogDAO($servername, $database, $username, $password);
$logservices = new LogServices($logdao);
$services = new PetProfileServices($dao);
$controller = new PetProfileController($services, $logservices);

if ($_SERVER["REQUEST_METHOD"] == "GET" && !isset($id)) {
    $controller->processCustomerRequest($_SERVER["REQUEST_METHOD"], null);
} else if ($_SERVER["REQUEST_METHOD"] == "POST" && !isset($id)) {
    $controller->processCustomerRequest($_SERVER["REQUEST_METHOD"], null);
} else if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($id)) {
    $controller->processCustomerRequest($_SERVER["REQUEST_METHOD"], $id);
} else if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($id)) {
    $controller->processCustomerRequest($_SERVER["REQUEST_METHOD"], $id);
}
