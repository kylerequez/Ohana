<?php
require dirname(__DIR__) . '/../config/db-config.php';
require dirname(__DIR__) . '/../dao/LogDAO.php';
require dirname(__DIR__) . '/../dao/OrderDAO.php';
require dirname(__DIR__) . '/../dao/TransactionDAO.php';
require dirname(__DIR__) . '/../services/LogServices.php';
require dirname(__DIR__) . '/../services/TransactionServices.php';
require dirname(__DIR__) . '/../controllers/TransactionController.php';

$dao = new TransactionDAO($servername, $database, $username, $password);
$orderDAO = new OrderDAO($servername, $database, $username, $password);
$logDAO = new LogDAO($servername, $database, $username, $password);
$services = new TransactionServices($dao, $orderDAO);
$logservices = new LogServices($logDAO);
$controller = new TransactionController($services, $logservices);

if ($_SERVER["REQUEST_METHOD"] == "GET" && !isset($id)) {
    $controller->processCheckoutRequest($_SERVER["REQUEST_METHOD"], null);
}
