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
// // echo $id . "<br>";
// echo (isset($id) ? "is set" : "is not set") . "<br>";
// echo (empty($id) ? "is empty" : "is not empty") . "<br>";
// print_r($_POST);

if($_SERVER["REQUEST_METHOD"] === "GET" && empty($id))
{
    // get staff accounts
    $controller->processStaffRequest($_SERVER["REQUEST_METHOD"], null);
} else if($_SERVER["REQUEST_METHOD"] === "POST" && empty($id)){
    // add staff account
    $_SESSION["data"] = $_POST;
    $controller->processStaffRequest($_SERVER["REQUEST_METHOD"], null);
} else if($_SERVER["REQUEST_METHOD"] === "GET" && !empty($id)){
    // delete staff account
    $controller->processStaffRequest($_SERVER["REQUEST_METHOD"], $id);
} else if($_SERVER["REQUEST_METHOD"] === "POST" && !empty($id)){
    // update staff account
    echo "Update";
    $_SESSION["data"] = $_POST;
    $controller->processStaffRequest($_SERVER["REQUEST_METHOD"], $id);
}
