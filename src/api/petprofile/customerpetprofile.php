<?php
require dirname(__DIR__) . '/../config/db-config.php';
require dirname(__DIR__) . '/../database/Database.php';
require dirname(__DIR__) . '/../dao/PetProfileDAO.php';
require dirname(__DIR__) . '/../dao/LogDAO.php';
require dirname(__DIR__) . '/../services/PetProfileServices.php';
require dirname(__DIR__) . '/../services/LogServices.php';
require dirname(__DIR__) . '/../controllers/PetProfileController.php';

$database = new Database($servername, $database, $username, $password);
$dao = new PetProfileDAO($database);
$logdao = new LogDAO($database);
$logservices = new LogServices($logdao);
$services = new PetProfileServices($dao);
$controller = new PetProfileController($services, $logservices);

if($_SERVER["REQUEST_METHOD"] == "GET" && (isset($type) && !isset($id)))
{
    // Display Rehoming Pet Profiles
    $controller->displayPetProfiles($type);
} else if ($_SERVER["REQUEST_METHOD"] == "GET" && !isset($id)) {
    // Display Own Pet Profiles
    $controller->processCustomerRequest($_SERVER["REQUEST_METHOD"], null);
} else if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($id)) {
    // Display Individual Pet Profile
    $controller->processCustomerRequest($_SERVER["REQUEST_METHOD"], $id);
}