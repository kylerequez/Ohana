<?php
require dirname(__DIR__) . '/../config/db-config.php';
require dirname(__DIR__) . '/../database/Database.php';
require dirname(__DIR__) . '/../dao/AccountDAO.php';
require dirname(__DIR__) . '/../services/AccountServices.php';
require dirname(__DIR__) . '/../controllers/AccountController.php';

$database = new Database($servername, $database, $username, $password);
$dao = new AccountDAO($database);
$services = new AccountServices($dao);
$controller = new AccountController($services, null);

if($_SERVER["REQUEST_METHOD"] == "POST")
{
    // register account
    // $_SESSION["data"] = $_POST;
    // $controller->processUserCollectionRequest($_SERVER["REQUEST_METHOD"]);
}