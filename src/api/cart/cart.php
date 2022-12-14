<?php
require dirname(__DIR__) . '/../config/db-config.php';
require dirname(__DIR__) . '/../dao/OrderDAO.php';
require dirname(__DIR__) . '/../dao/PetProfileDAO.php';
require dirname(__DIR__) . '/../services/CartServices.php';
require dirname(__DIR__) . '/../controllers/CartController.php';

$dao = new PetProfileDAO($servername, $database, $username, $password);
$order = new OrderDAO($servername, $database, $username, $password);
$services = new CartServices($dao, $order);
$controller = new CartController($services, null);

if ($_SERVER["REQUEST_METHOD"] == "GET" && !isset($id)) {
    $controller->processRequest($_SERVER["REQUEST_METHOD"], null);
} else if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($id)) {
    $controller->processRequest($_SERVER["REQUEST_METHOD"], $id);
} else if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($id)) {
    $controller->processRequest($_SERVER["REQUEST_METHOD"], $id);
}
