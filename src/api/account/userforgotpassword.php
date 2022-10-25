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

// echo $_POST["email"];

if($_SERVER["REQUEST_METHOD"] == "GET" and !empty($_GET["email"]))
{
    echo $_SERVER["REQUEST_METHOD"];
    $controller->forgotPasswordRequest($_SERVER["REQUEST_METHOD"], $_GET["email"]);
} else if ($_SERVER["REQUEST_METHOD"] == "POST" and !empty($_POST["email"])) {
    echo $_SERVER["REQUEST_METHOD"];
    echo $_POST["email"];
    $controller->forgotPasswordRequest($_SERVER["REQUEST_METHOD"], $_POST["email"]);
}