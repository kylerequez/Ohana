<?php

require dirname(__DIR__) . '/../config/db-config.php';
require dirname(__DIR__) . '/../dao/OrderDAO.php';
require dirname(__DIR__) . '/../dao/TransactionDAO.php';
require dirname(__DIR__) . '/../services/TransactionServices.php';

$dao = new TransactionDAO($servername, $database, $username, $password);
$orderDAO = new OrderDAO($servername, $database, $username, $password);
$services = new TransactionServices($dao, $orderDAO, null, null, null);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $services->exportSalesReport($_POST);
}
