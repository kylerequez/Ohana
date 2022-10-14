<?php
require dirname(__DIR__) . '/../config/db-config.php';
require dirname(__DIR__) . '/../database/Database.php';
require dirname(__DIR__) . '/../dao/AccountDAO.php';
require dirname(__DIR__) . '/../dao/LogDAO.php';
require dirname(__DIR__) . '/../services/AccountServices.php';
require dirname(__DIR__) . '/../services/LogServices.php';
require dirname(__DIR__) . '/../controllers/AccountController.php';

$database = new Database($servername, $database, $username, $password);
$dao = new AccountDAO($database);
$logdao = new LogDAO($database);
$services = new AccountServices($dao);
$logservices = new LogServices($logdao);
$controller = new AccountController($services, $logservices);

// echo $_SERVER["REQUEST_METHOD"] . "<br>";
// echo $id . "<br>";
// print_r($_POST);

if($_SERVER["REQUEST_METHOD"] === "GET" && !isset($id))
{
    // get user accounts
    $controller->processUserCollectionRequest($_SERVER["REQUEST_METHOD"], null);
} else if($_SERVER["REQUEST_METHOD"] === "POST" && !isset($id)){
    
} else if($_SERVER["REQUEST_METHOD"] === "GET" && isset($id)){
    
}