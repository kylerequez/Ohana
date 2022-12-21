<?php
include_once dirname(__DIR__) . '/../config/db-config.php';
include_once dirname(__DIR__) . '/../dao/AccountDAO.php';
include_once dirname(__DIR__) . '/../services/AccountServices.php';
include_once dirname(__DIR__) . '/../controllers/AccountController.php';

$dao = new AccountDAO($servername, $database, $username, $password);
$services = new AccountServices($dao);
$controller = new AccountController($services, null);

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_SESSION)) {
    if (!isset($_SESSION['time']) || $_SESSION['time'] + (5 * 60) < time()) {
        $_SESSION['msg'] = "You have exceeded the maximum time period (5 minutes) to enter the OTP. Please login again.";
        unset($_SESSION["email"]);
        unset($_SESSION["userOtp"]);
        unset($_SESSION["token"]);
        header("Location: https://" . DOMAIN_NAME . "/login");
        exit();
    }
    $controller->loginRequest($_SERVER["REQUEST_METHOD"]);
} else if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $controller->loginRequest($_SERVER["REQUEST_METHOD"]);
}
