<?php
include_once dirname(__DIR__) . '/../config/db-config.php';
include_once dirname(__DIR__) . '/../dao/AccountDAO.php';
include_once dirname(__DIR__) . '/../services/AccountServices.php';
include_once dirname(__DIR__) . '/../controllers/AccountController.php';

$dao = new AccountDAO($servername, $database, $username, $password);
$services = new AccountServices($dao);
$controller = new AccountController($services, null);

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $controller->resendLoginRequest($_SERVER["REQUEST_METHOD"], $_SESSION["email"], $_SESSION["token"]);
}
