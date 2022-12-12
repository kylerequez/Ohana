<?php
require dirname(__DIR__) . '/../config/db-config.php';
require dirname(__DIR__) . '/../dao/AccountDAO.php';
require dirname(__DIR__) . '/../dao/LogDAO.php';
require dirname(__DIR__) . '/../services/AccountServices.php';
require dirname(__DIR__) . '/../services/LogServices.php';
require dirname(__DIR__) . '/../controllers/AccountController.php';

$dao = new AccountDAO($servername, $database, $username, $password);
$logdao = new LogDAO($servername, $database, $username, $password);
$services = new AccountServices($dao);
$logservices = new LogServices($logdao);
$controller = new AccountController($services, $logservices);

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_SESSION["user"])) {
    $controller->processEditAccount($_SERVER["REQUEST_METHOD"]);
} else if ($_SERVER["REQUEST_METHOD"] === "GET" && isset($_SESSION["user"])) {
    $controller->processEditAccount($_SERVER["REQUEST_METHOD"]);
}
