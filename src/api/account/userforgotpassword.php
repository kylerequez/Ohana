<?php
require dirname(__DIR__) . '/../config/db-config.php';
require dirname(__DIR__) . '/../dao/AccountDAO.php';
require dirname(__DIR__) . '/../dao/LogDAO.php';
require dirname(__DIR__) . '/../services/AccountServices.php';
require dirname(__DIR__) . '/../services/LogServices.php';
require dirname(__DIR__) . '/../controllers/AccountController.php';

$dao = new AccountDAO($servername, $database, $username, $password);
$logdao = new LogDAO($servername, $database, $username, $password);
$services = new AccountServices($dao);
$logservices = new LogServices($logdao);
$controller = new AccountController($services, $logservices);

if ($_SERVER["REQUEST_METHOD"] == "GET" and !empty($_GET["email"])) {
    $controller->forgotPasswordRequest($_SERVER["REQUEST_METHOD"], $_GET["email"]);
} else if ($_SERVER["REQUEST_METHOD"] == "POST" and !empty($_SESSION["email"])) {
    if (!isset($_SESSION['time']) || $_SESSION['time'] + (5 * 60) < time()) {
        $_SESSION['msg'] = "You have exceeded the maximum time period (5 minutes) to enter a new password. Please send another change password request again.";
        unset($_SESSION["email"]);
        unset($_SESSION["userOtp"]);
        unset($_SESSION["token"]);
        header("Location: https://" . DOMAIN_NAME . "/forgot-password");
        exit();
    }
    $controller->forgotPasswordRequest($_SERVER["REQUEST_METHOD"], $_SESSION["email"]);
} else if ($_SERVER["REQUEST_METHOD"] == "GET" and (!empty($_SESSION["email"] and !empty($token)))) {
    if (!isset($_SESSION['time']) || $_SESSION['time'] + (5 * 60) < time()) {
        $_SESSION['msg'] = "You have exceeded the maximum time period (5 minutes) to click the link. Please send another change password request again.";
        unset($_SESSION["email"]);
        unset($_SESSION["userOtp"]);
        unset($_SESSION["token"]);
        header("Location: https://" . DOMAIN_NAME . "/forgot-password");
        exit();
    }
    $controller->resendForgotPasswordRequest($_SERVER["REQUEST_METHOD"], $_SESSION["email"], $token);
}
