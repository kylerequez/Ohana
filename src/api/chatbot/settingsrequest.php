<?php
require dirname(__DIR__) . '/../config/db-config.php';
require dirname(__DIR__) . '/../dao/ChatbotDAO.php';
require dirname(__DIR__) . '/../dao/LogDAO.php';
require dirname(__DIR__) . '/../services/ChatbotServices.php';

$dao = new ChatbotDAO($servername, $database, $username, $password);
$services = new ChatbotServices($dao);

$settings = $services->getAllSettings();
$avatar = $settings->getAvatar();
$name = $settings->getName();
$intro = $settings->getIntroduction();
$noResponse = $settings->getNoResponse();

echo json_encode([
    "avatar" => $avatar,
    "name" => $name,
    "intro" => $intro,
    "noResponse" => $noResponse
]);
