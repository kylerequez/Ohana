<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


require dirname(__DIR__) . '/../config/db-config.php';
require dirname(__DIR__) . '/../database/Database.php';
require dirname(__DIR__) . '/../dao/LogDAO.php';
require dirname(__DIR__) . '/../dao/OrderDAO.php';
require dirname(__DIR__) . '/../dao/TransactionDAO.php';
require dirname(__DIR__) . '/../services/LogServices.php';
require dirname(__DIR__) . '/../services/TransactionServices.php';
require dirname(__DIR__) . '/../controllers/TransactionController.php';

$database = new Database($servername, $database, $username, $password);
$dao = new TransactionDAO($database);
$orderDAO = new OrderDAO($database);
$logDAO = new LogDAO($database);
$services = new TransactionServices($dao, $orderDAO);
$logservices = new LogServices($logDAO);
$controller = new TransactionController($services, $logservices);

if ($_SERVER["REQUEST_METHOD"] == "GET" && !isset($id)) {
    echo "HERE";
    $controller->processRequest($_SERVER["REQUEST_METHOD"], null);
}
