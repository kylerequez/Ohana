<?php
require dirname(__DIR__) . '/../config/db-config.php';
require dirname(__DIR__) . '/../dao/LogDAO.php';
require dirname(__DIR__) . '/../services/LogServices.php';
require dirname(__DIR__) . '/../controllers/LogController.php';

$dao = new LogDAO($servername, $database, $username, $password);
$services = new LogServices($dao);
$controller = new LogController($services);

if($_SERVER["REQUEST_METHOD"] === "GET" && !isset($id))
{
    $controller->processLogRequest($_SERVER["REQUEST_METHOD"], null);
}