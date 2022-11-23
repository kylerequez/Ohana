<?php
require dirname(__DIR__) . '/../config/db-config.php';
require dirname(__DIR__) . '/../database/Database.php';
require dirname(__DIR__) . '/../dao/ChatbotDAO.php';
require dirname(__DIR__) . '/../dao/LogDAO.php';
require dirname(__DIR__) . '/../services/ChatbotServices.php';

$database = new Database($servername, $database, $username, $password);
$dao = new ChatbotDAO($database);
$services = new ChatbotServices($dao);

$settings = $services->getAllSettings();
$logo = $settings->getBlob();
$name = $settings->getName();
$intro = $settings->getIntroduction();
$noResponse = $settings->getNoResponse();

echo json_encode([
    "name" => $name,
    "intro" => $intro,
    "noResponse" => $noResponse
]);
