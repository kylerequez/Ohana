<?php
require dirname(__DIR__) . '/../config/db-config.php';
require dirname(__DIR__) . '/../dao/LogDAO.php';
require dirname(__DIR__) . '/../dao/OrderDAO.php';
require dirname(__DIR__) . '/../dao/TransactionDAO.php';
require dirname(__DIR__) . '/../dao/PetProfileDAO.php';
require dirname(__DIR__) . '/../dao/StudHistoryDAO.php';
require dirname(__DIR__) . '/../dao/BoardingSlotDAO.php';
require dirname(__DIR__) . '/../services/LogServices.php';
require dirname(__DIR__) . '/../services/TransactionServices.php';
require dirname(__DIR__) . '/../controllers/TransactionController.php';

$dao = new TransactionDAO($servername, $database, $username, $password);
$orderDAO = new OrderDAO($servername, $database, $username, $password);
$logDAO = new LogDAO($servername, $database, $username, $password);
$petProfile = new PetProfileDAO($servername, $database, $username, $password);
$studHistory = new StudHistoryDAO($servername, $database, $username, $password);
$slot = new BoardingSlotDAO($servername, $database, $username, $password);
$services = new TransactionServices($dao, $orderDAO, $petProfile, $studHistory, $slot);
$logservices = new LogServices($logDAO);
$controller = new TransactionController($services, $logservices);

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($reference) && isset($type)) {
    if ($type == 'rehoming') {
        $controller->processCheckoutRequest($_SERVER["REQUEST_METHOD"], $reference);
    } else if ($type == 'stud') {
        $controller->processStudCheckoutRequest($_SERVER["REQUEST_METHOD"], $reference);
    }
} else if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($type)) {
    if ($type == 'rehoming') {
        $controller->processCheckoutRequest($_SERVER["REQUEST_METHOD"], trim($_POST['reference']));
    } else if ($type == 'stud') {
        $controller->processStudCheckoutRequest($_SERVER["REQUEST_METHOD"], trim($_POST['reference']));
    }
}
