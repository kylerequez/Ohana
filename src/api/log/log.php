<?php
require dirname(__DIR__) . '/../config/db-config.php';
require dirname(__DIR__) . '/../database/Database.php';
require dirname(__DIR__) . '/../dao/LogDAO.php';
require dirname(__DIR__) . '/../services/LogServices.php';
require dirname(__DIR__) . '/../controllers/LogController.php';

error_reporting(E_ALL);
ini_set('display_errors', '1');

$database = new Database($servername, $database, $username, $password);
$dao = new LogDAO($database);
$services = new LogServices($dao);
$controller = new LogController($services);

// echo $_SERVER["REQUEST_METHOD"] . "<br>";
// echo $id . "<br>";
// print_r($_POST);

if($_SERVER["REQUEST_METHOD"] === "GET" && !isset($id))
{
    // get log 
    $controller->processLogRequest($_SERVER["REQUEST_METHOD"], null);
} else if($_SERVER["REQUEST_METHOD"] === "POST" && !isset($id)){
    // add log
    $_SESSION["data"] = $_POST;
    $controller->processLogRequest($_SERVER["REQUEST_METHOD"], null);
}