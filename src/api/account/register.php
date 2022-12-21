<?php
include_once dirname(__DIR__) . '/../config/db-config.php';
include_once dirname(__DIR__) . '/../dao/AccountDAO.php';
include_once dirname(__DIR__) . '/../services/AccountServices.php';
include_once dirname(__DIR__) . '/../controllers/AccountController.php';

$dao = new AccountDAO($servername, $database, $username, $password);
$services = new AccountServices($dao);
$controller = new AccountController($services, null);

if ($_SERVER["REQUEST_METHOD"] == "GET" && (!isset($token))) {
    if (!isset($_SESSION['time']) || $_SESSION['time'] + (5 * 60) < time()) {
        $services->deleteAccountByEmail($_SESSION['email']);
        $_SESSION['msg'] = "You have exceeded the maximum time period (5 minutes) to enter the OTP. Please register again.";
        unset($_SESSION["email"]);
        unset($_SESSION["userOtp"]);
        unset($_SESSION["token"]);
        header("Location: https://" . DOMAIN_NAME . "/register");
        exit();
    }
    $controller->registrationRequest($_SERVER["REQUEST_METHOD"]);
} else if ($_SERVER["REQUEST_METHOD"] == "POST" && (empty($_SESSION["msg"]))) {
    $controller->registrationRequest($_SERVER["REQUEST_METHOD"]);
} else if ($_SERVER["REQUEST_METHOD"] == "GET" && (isset($token))) {
    if (!isset($_SESSION['time']) || $_SESSION['time'] + (5 * 60) < time()) {
        $services->deleteAccountByEmail($_SESSION['email']);
        $_SESSION['msg'] = "You have exceeded the maximum time period (5 minutes) to enter the OTP. Please register again.";
        unset($_SESSION["email"]);
        unset($_SESSION["userOtp"]);
        unset($_SESSION["token"]);
        header("Location: https://" . DOMAIN_NAME . "/register");
        exit();
    }
    $controller->resendRegistrationRequest($_SERVER["REQUEST_METHOD"], $_SESSION["email"], $token);
}
